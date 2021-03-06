Imports System.Configuration
Public Class step1
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
    Protected WithEvents RequiredFieldValidator2 As System.Web.UI.WebControls.RequiredFieldValidator
    Protected WithEvents Rangevalidator2 As System.Web.UI.WebControls.RangeValidator
    Protected WithEvents Rangevalidator1 As System.Web.UI.WebControls.RangeValidator
    Protected WithEvents btnNext As Button
    Protected WithEvents txtEmail, txtPhone, txtName, txtDistanceFeet, txtDistanceInches, txtPointCount, txtPerimCount, txtCrossCount As TextBox
    Protected WithEvents Requiredfieldvalidator4 As System.Web.UI.WebControls.RequiredFieldValidator
    Protected WithEvents RequiredFieldValidator1 As System.Web.UI.WebControls.RequiredFieldValidator
    Protected WithEvents RangeValidator3 As System.Web.UI.WebControls.RangeValidator
    Protected WithEvents RequiredFieldValidator3 As System.Web.UI.WebControls.RequiredFieldValidator

    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here
    End Sub

    '- move to the next step
    Private Sub btnNext_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnNext.Click

        '- gay message
        Dim Message As String

        Page.Validate()
        If Page.IsValid Then
            Session("pointcount") = CInt(Val(txtPointCount.Text))
            Session("crosscount") = CInt(Val(txtCrossCount.Text))
            Session("perimcount") = CInt(Val(txtPerimCount.Text))
            Session("referencedistance") = Val(txtDistanceFeet.Text) * 12 + Val(txtDistanceInches.Text)
            Session("plotid") = DB.PlotAddNew(txtName.Text, txtPhone.Text, txtEmail.Text, Session("referencedistance"), Session("pointcount"), Session("crosscount"), Session("perimcount"))
            DB.PlotUpdateStep(Session("plotid"), 2)

            Message = "Thank you for interest in a high quality D.S. Sewing swimming pool cover." & vbCrLf & vbCrLf & _
            "This is your plot ID #" & Session("plotid") & vbCrLf & vbCrLf & _
            "If you have further questions or need help using this tool then please call 1-800-789-8143." & vbCrLf & vbCrLf & _
            "Thank You," & vbCrLf & "The D.S. Sewin"

            Try
                'Web.Mail.SmtpMail.SmtpServer = "192.168.0.241" '"66.181.201.11"
                Web.Mail.SmtpMail.SmtpServer = ConfigurationSettings.AppSettings("SmtpServer").ToString()
                Web.Mail.SmtpMail.Send("dsteinhardt@ds-sewing.com", txtEmail.Text, "D.S. Sewing Swimming Pool Cover #" & Session("plotid"), Message)
                Web.Mail.SmtpMail.Send("dsteinhardt@ds-sewing.com", "dsteinhardt@ds-sewing.com", "Plot ID# " & Session("plotid") & " - " & txtEmail.Text, _
                    txtName.Text & vbCrLf & _
                    txtPhone.Text & vbCrLf & _
                    txtEmail.Text & vbCrLf)
            Catch Ex As Exception
                '- do nothing on exception
                Throw Ex
            End Try

            Response.Redirect("step2.aspx", True)
        End If
    End Sub
End Class
