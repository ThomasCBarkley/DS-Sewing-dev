Public Class step0
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

    Protected WithEvents btnStart As Button
    Protected WithEvents rbStart0, rbStart1 As RadioButton
    Protected WithEvents txtPlotID As TextBox
    Protected WithEvents rvPlotID As RequiredFieldValidator
    Protected WithEvents rngvPlotID As RangeValidator
    Protected WithEvents Validationsummary1 As System.Web.UI.WebControls.ValidationSummary
    Protected WithEvents pnlPlotNotFound As Panel

    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here
        Dim sHost As String = Request.Url.Host.ToLower

        If sHost = "dssewing.com" Or sHost = "www.dssewing.com" Then
            Response.Redirect("https://www.ds-sewing.com/pool/wizard/step0.aspx", True)
        End If
    End Sub

    Private Sub btnStart_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnStart.Click
        If rbStart0.Checked = True Then
            '- we are starting a new pool cover
            rvPlotID.Enabled = False
            rngvPlotID.Enabled = False
            Response.Redirect("step1.aspx", True)
        Else
            '- we are continuing an old pool cover
            rvPlotID.Enabled = True
            rngvPlotID.Enabled = True

            Page.Validate()

            If Page.IsValid Then
                Dim oDR As Data.SqlClient.SqlDataReader
                oDR = DB.PlotGet(CInt(Val(txtPlotID.Text)))

                If oDR.Read Then
                    Session("name") = DB.DB2S(oDR("name"))
                    Session("phone") = DB.DB2S(oDR("phone"))
                    Session("email") = DB.DB2S(oDR("email"))

                    Session("plotid") = oDR("plotid")
                    Session("referencedistance") = oDR("referencedistance")
                    Session("pointcount") = oDR("pointcount")
                    Session("crosscount") = oDR("crosscount")
                    Session("perimcount") = oDR("perimcount")
                    Response.Redirect("step" & oDR("laststep") & ".aspx")
                    oDR = Nothing
                Else
                    pnlPlotNotFound.Visible = True
                End If
            End If
        End If
    End Sub
End Class
