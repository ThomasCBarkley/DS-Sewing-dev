Public Class proxy
    Inherits System.Web.UI.Page

#Region " Web Form Designer Generated Code "

    'This call is required by the Web Form Designer.
    <System.Diagnostics.DebuggerStepThrough()> Private Sub InitializeComponent()

    End Sub

    Private Sub Page_Init(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Init
        'CODEGEN: This method call is required by the Web Form Designer
        'Do not modify it using the code editor.
        InitializeComponent()
    End Sub

#End Region

    Protected WithEvents ValidationSummary1 As System.Web.UI.WebControls.ValidationSummary
    Protected WithEvents imgPlot As Web.UI.WebControls.Image


    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here

        Dim oShape As netplot.ShapeContainer
        Dim PlotId As Integer
        Dim PointCount As Integer
        Dim I As Integer
        Dim arrD(1) As Double

        PlotId = 100151
        PointCount = "test123"

        oShape = New netplot.ShapeContainer()
        oShape.ReferenceDistance = 100

        For I = 0 To PointCount - 1
            arrD = DB.PlotGetABPoint(PlotId, I + 1)
            oShape.AddPoint(arrD(0), arrD(1))
        Next

        Dim iPath As String


        If Request.Url.Host = "localhost" Then
            iPath = "c:\inetpub\wwwroot\pooltest\images\"
        Else
            'iPath = "c:\inetpub\wwwroot\ds\pool\wizard\images\"
            iPath = ConfigurationSettings.AppSettings("pathSavedImages").ToString()
        End If

        netplot.ShapeRenderer.RenderToImage(oShape, 640, 480, True, 50).Save(iPath & Session.SessionID & ".png")        
        netplot.ShapeRenderer.RenderToImage(oShape, 160, 120, False, 25).Save(iPath & Session.SessionID & ".small.png")
        'netplot.ShapeRenderer.RenderToDXF(oShape, "c:\plot files\" & PlotId & ".dxf")
        netplot.ShapeRenderer.RenderToDXF(oShape, ConfigurationSettings.AppSettings("pathPlotFiles").ToString() & PlotId & ".dxf")

        imgPlot.ImageUrl = "images\" & Session.SessionID & ".png?r=" & New Random().NextDouble
    End Sub

End Class
