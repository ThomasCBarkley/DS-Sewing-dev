Public Class step3
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

    Protected WithEvents btnNext, btnPrev As Button
    Protected WithEvents ValidationSummary1 As System.Web.UI.WebControls.ValidationSummary
    Protected WithEvents imgPlot As Web.UI.WebControls.Image


    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here

        Dim oShape As netplot.ShapeContainer
        Dim PlotId As Integer
        Dim SessionId As Integer
        Dim PointCount As Integer
        Dim I As Integer
        Dim arrD(1) As Double
        Dim iName As String

        PlotId = Request.QueryString("plot_id")
        PointCount = Request.QueryString("point_count")
        SessionId = Request.QueryString("session_id")

        oShape = New netplot.ShapeContainer()
        oShape.ReferenceDistance = Request.QueryString("ref_dist")

        For I = 0 To PointCount - 1
            arrD = DB.PlotGetABPoint(PlotId, I + 1)
            oShape.AddPoint(arrD(0), arrD(1))
        Next

        Dim iPath As String
        Dim Generator As System.Random = New System.Random()

        'iName = PlotId & "_" & Generator.Next(100000, 999999 + 1)
        iName = PlotId

        If Request.Url.Host = "localhost" Then
            iPath = "c:\inetpub\wwwroot\pooltest\images\"
        Else
            iPath = ConfigurationSettings.AppSettings("pathSavedImages").ToString()
        End If

        netplot.ShapeRenderer.RenderToImage(oShape, 640, 480, True, 50).Save(iPath & iName & ".png")

        netplot.ShapeRenderer.RenderToImage(oShape, 160, 120, False, 25).Save(iPath & iName & ".small.png")
        'netplot.ShapeRenderer.RenderToDXF(oShape, "c:\plot files\" & PlotId & ".dxf")
        netplot.ShapeRenderer.RenderToDXF(oShape, ConfigurationSettings.AppSettings("pathPlotFiles").ToString() & PlotId & ".dxf")


        Dim minX, maxX, minY, maxY, Width, Height, Weight As Double
        Dim oArray As ArrayList
        Dim oV As netplot.Vector2D

        oArray = oShape.ComputeVectors()

        For Each oV In oArray
            If oV.X > maxX Then maxX = oV.X
            If oV.X < minX Then minX = oV.X
            If oV.Y > maxY Then maxY = oV.Y
            If oV.Y < minY Then minY = oV.Y
        Next

        Dim dWidth, dHeight, fWidth, fHeight As Double
        Dim oBB As Vector2D()

        '- get the axis aligned bounding box for this pool
        oBB = netplot.geometry.ComputeAABB(oArray)

        dWidth = oBB(0).Distance(oBB(1))
        dHeight = oBB(1).Distance(oBB(2))

        Width = dWidth
        Height = dHeight

        Dim jse As Script.Serialization.JavaScriptSerializer = New Script.Serialization.JavaScriptSerializer
        Dim jsonoutput = jse.Serialize(New With {.image = iName, .width = Width, .height = Height, .weight = Weight})

        Context.Response.ContentType = "application/json"
        Context.Response.Write(jsonoutput)
        Context.Response.End()

    End Sub
End Class
