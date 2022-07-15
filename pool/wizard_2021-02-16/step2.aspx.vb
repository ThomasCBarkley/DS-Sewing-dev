'
' this is some of this shitiest code I've written but I'm out of time :(
'
Public Class step2
    Inherits System.Web.UI.Page

#Region " Web Form Designer Generated Code "

    'This call is required by the Web Form Designer.
    <System.Diagnostics.DebuggerStepThrough()> Private Sub InitializeComponent()

    End Sub

    Private Sub Page_Init(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Init
        'CODEGEN: This method call is required by the Web Form Designer
        'Do not modify it using the code editor.
        InitializeComponent()

        '- rebuild the dynamic controls        
        BuildInputControls()
    End Sub

#End Region

    Protected WithEvents tblPerim, tblPoints, tblCross As Table
    Protected WithEvents ValidationSummary1 As System.Web.UI.WebControls.ValidationSummary
    Protected WithEvents test As System.Web.UI.WebControls.TextBox
    Protected WithEvents RequiredFieldValidator1 As System.Web.UI.WebControls.RequiredFieldValidator
    'Protected WithEvents imgRender As System.Web.UI.WebControls.Image
    Protected WithEvents btnSave, btnNext As Button
    Protected WithEvents lblABDist, lblName, lblEmail, lblPhone As Label

    Private Sub BuildInputControls()
        Dim I As Integer
        Dim oTB As TextBox
        Dim oRow As TableRow
        Dim oCell As TableCell
        Dim oRV As RangeValidator
        Dim oRQV As RequiredFieldValidator
        Dim oCV As CustomValidator
        Dim PlotID, PointCount, CrossCount, PerimCount As Integer
        Dim ReferenceDistance As Double

        PlotID = Session("plotid")
        PointCount = Session("pointcount")
        CrossCount = Session("crosscount")
        PerimCount = Session("perimcount")
        ReferenceDistance = Session("referencedistance")

        Dim arrDB(1) As Double

        For I = 0 To PointCount - 1
            arrDB = DB.PlotGetABPoint(PlotID, I + 1)

            oRow = New TableRow()
            oRow.ID = "TR" & I

            oCell = New TableCell()

            '- add number
            oCell = New TableCell()
            oCell.Text = I + 1
            oRow.Cells.Add(oCell)

            '- add feet box
            oCell = New TableCell()

            oTB = New TextBox()            
            oTB.ID = "PAF" & I
            oTB.Columns = 3
            oTB.MaxLength = 3
            oTB.Text = Math.Floor(arrDB(0) / 12)    ' number of A feet

            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("feet"))

            '- add inches box
            oTB = New TextBox()
            oTB.ID = "PAI" & I
            oTB.Columns = 5
            oTB.MaxLength = 5
            oTB.Text = arrDB(0) Mod 12  ' number of A inches

            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("inches"))

            oRow.Controls.Add(oCell)

            '- add feet box
            oCell = New TableCell()

            oTB = New TextBox()
            oTB.ID = "PBF" & I
            oTB.Columns = 3
            oTB.MaxLength = 3
            oTB.Text = Math.Floor(arrDB(1) / 12)    ' number of B feet

            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("feet"))

            '- add inches box
            oTB = New TextBox()
            oTB.ID = "PBI" & I
            oTB.Columns = 5
            oTB.MaxLength = 5
            oTB.Text = arrDB(1) Mod 12

            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("inches"))

            oRow.Cells.Add(oCell)

            '-add this rows validators
            oCell = New TableCell()

            'oRV = New RangeValidator()
            'oRV.ControlToValidate = "PAI" & I
            'oRV.ID = "RVPAI" & I
            'oRV.Type = ValidationDataType.Double
            'oRV.MinimumValue = 0 : oRV.MaximumValue = 12
            'oRV.ErrorMessage = "A" & I + 1 & " inches must be between 0 and 12"
            'oRV.EnableClientScript = True
            'oRV.Text = "*"
            'oRV.Enabled = True
            'oCell.Controls.Add(oRV)

            'oRV = New RangeValidator()
            'oRV.ControlToValidate = "PAF" & I
            'oRV.Type = ValidationDataType.Double
            'oRV.MinimumValue = 0 : oRV.MaximumValue = 120
            'oRV.ErrorMessage = "A" & I + 1 & " feet must be between 0 and 120"
            'oRV.Text = "*"
            'oCell.Controls.Add(oRV)

            '- add the "custom" validator
            oCV = New CustomValidator()
            oCV.ID = "CV" & I
            oCV.ControlToValidate = "PAF" & I
            oCV.ErrorMessage = "A" & I + 1 & " appears to be an invalid measurement. Please measure it again."
            oCV.Text = "*"
            oCell.Controls.Add(oCV)

            oRow.Cells.Add(oCell)

            tblPoints.Rows.Add(oRow)
        Next

        '- crosses
        Dim oCP As netplot.CrossPoint

        For I = 0 To CrossCount - 1
            oRow = New TableRow()

            oCP = DB.PlotGetCrossPoint(PlotID, I + 1)

            '- add the from box
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 3
            oTB.Columns = 3
            oTB.ID = "CPF" & I
            oTB.Text = oCP.FromIndex
            oCell.Controls.Add(oTB)
            oRow.Cells.Add(oCell)

            '- add the to box
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 3
            oTB.Columns = 3
            oTB.ID = "CPT" & I
            oTB.Text = oCP.ToIndex
            oCell.Controls.Add(oTB)
            oRow.Cells.Add(oCell)

            '- add the cross point ft
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 7
            oTB.Columns = 7
            oTB.ID = "CPSF" & I
            oTB.Text = Math.Floor(oCP.Distance / 12)
            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("feet"))
            oTB = New TextBox()
            oTB.MaxLength = 7
            oTB.Columns = 7
            oTB.ID = "CPSI" & I
            oTB.Text = oCP.Distance Mod 12
            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("inches"))

            '- add the range validators
            oRV = New RangeValidator()
            oRV.ControlToValidate = "CPF" & I
            oRV.Type = ValidationDataType.Integer
            oRV.MinimumValue = 1 : oRV.MaximumValue = PointCount
            oRV.ErrorMessage = "X start point must be between 1 and " & PointCount
            oRV.ID = "RVCPF" & I
            oRV.Text = "*"
            oRV.EnableClientScript = False
            oCell.Controls.Add(oRV)

            oRV = New RangeValidator()
            oRV.ControlToValidate = "CPT" & I
            oRV.Type = ValidationDataType.Integer
            oRV.MinimumValue = 1 : oRV.MaximumValue = PointCount
            oRV.ErrorMessage = "X start end must be between 1 and " & PointCount
            oRV.Text = "*"
            oRV.ID = "RVCPT" & I
            oRV.EnableClientScript = False
            oCell.Controls.Add(oRV)

            '- add the custom validator
            oCV = New CustomValidator()
            oCV.ID = "CVCC" & I
            oCV.ControlToValidate = "CPT" & I
            oCV.ErrorMessage = "Crosscheck " & I + 1 & " appears to be an invalid measurement. Please measure it again."
            oCV.Text = "*"
            oCell.Controls.Add(oCV)

            oRow.Cells.Add(oCell)

            tblCross.Rows.Add(oRow)
        Next

        '- perimeters

        Dim oPP As netplot.PerimeterPoint

        For I = 0 To PerimCount - 1
            oRow = New TableRow()

            oPP = DB.PlotGetPerimPoint(PlotID, I + 1)

            '- add the from box
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 3
            oTB.Columns = 3
            oTB.ID = "PPF" & I
            oTB.Text = oPP.FromIndex
            oCell.Controls.Add(oTB)
            oRow.Cells.Add(oCell)

            '- add the to box
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 3
            oTB.Columns = 3
            oTB.ID = "PPT" & I
            oTB.Text = oPP.ToIndex
            oCell.Controls.Add(oTB)
            oRow.Cells.Add(oCell)

            '- add the cross point ft
            oCell = New TableCell()
            oTB = New TextBox()
            oTB.MaxLength = 7
            oTB.Columns = 7
            oTB.ID = "PPSF" & I
            oTB.Text = Math.Floor(oPP.Distance / 12)
            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("feet"))
            oTB = New TextBox()
            oTB.MaxLength = 7
            oTB.Columns = 7
            oTB.ID = "PPSI" & I
            oTB.Text = oPP.Distance Mod 12
            oCell.Controls.Add(oTB)
            oCell.Controls.Add(New LiteralControl("inches"))

            '- add the range validators
            oRV = New RangeValidator()
            oRV.ControlToValidate = "PPF" & I
            oRV.Type = ValidationDataType.Integer
            oRV.MinimumValue = 1 : oRV.MaximumValue = PointCount
            oRV.ErrorMessage = "X start point must be between 1 and " & PointCount
            oRV.Text = "*"
            oRV.ID = "RVPPF" & I
            oRV.EnableClientScript = False
            oCell.Controls.Add(oRV)

            oRV = New RangeValidator()
            oRV.ControlToValidate = "PPT" & I
            oRV.Type = ValidationDataType.Integer
            oRV.MinimumValue = 1 : oRV.MaximumValue = PointCount
            oRV.ErrorMessage = "X start end must be between 1 and " & PointCount
            oRV.Text = "*"
            oRV.ID = "RVPPT" & I
            oRV.EnableClientScript = False
            oCell.Controls.Add(oRV)

            '- add the custom validator
            oCV = New CustomValidator()
            oCV.ID = "CVPC" & I
            oCV.ControlToValidate = "PPT" & I
            oCV.ErrorMessage = "Permiter " & I + 1 & " appears to be an invalid measurement. Please measure it again."
            oCV.Text = "*"
            oCell.Controls.Add(oCV)

            oRow.Cells.Add(oCell)

            tblPerim.Rows.Add(oRow)
        Next

        '- setup welcome text
        lblABDist.Text = String.Format("{0:f3} feet {1:f3} inches", Math.Floor(ReferenceDistance / 12), ReferenceDistance Mod 12)

        lblName.Text = Session("name")
        lblPhone.Text = Session("phone")
        lblEmail.Text = Session("email")
    End Sub

    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here
    End Sub

    Private Sub ProcessPage()
        Dim PointCount As Integer
        Dim ReferenceDistance As Double

        PointCount = Session("pointcount")
        ReferenceDistance = Session("referencedistance")

        Page.Validate()

        '- render the picture, joy
        Dim oShape As New netplot.ShapeContainer()
        Dim S As String
        Dim sIndex As String
        Dim oCFrom, oCTo, oCDistFeet, oCDistInch, oAFeet, oAInch, oBFeet, oBInch As TextBox
        Dim distA, distB As Double

        oShape.ReferenceDistance = ReferenceDistance ' 4.49533  '[TEMP]

        For Each S In Request.Form().AllKeys()        
            If Left(S, 3) = "PAF" Then
                sIndex = Mid(S, 4)
                oAFeet = tblPoints.FindControl("PAF" & sIndex)
                oAInch = tblPoints.FindControl("PAI" & sIndex)
                oBFeet = tblPoints.FindControl("PBF" & sIndex)
                oBInch = tblPoints.FindControl("PBI" & sIndex)
                distA = Val(oAFeet.Text) * 12 + Val(oAInch.Text)
                distB = Val(oBFeet.Text) * 12 + Val(oBInch.Text)
                DB.PlotUpdateABPoint(Session("plotid"), CInt(sIndex) + 1, distA, distB)
                oShape.AddPoint(distA, distB)
            ElseIf Left(S, 3) = "CPF" Then
                sIndex = Mid(S, 4)
                oCFrom = tblCross.FindControl("CPF" & sIndex)
                oCTo = tblCross.FindControl("CPT" & sIndex)
                oCDistFeet = tblCross.FindControl("CPSF" & sIndex)
                oCDistInch = tblCross.FindControl("CPSI" & sIndex)

                distA = Val(oCDistFeet.Text) * 12 + Val(oCDistInch.Text)
                DB.Plot_UpdateCross(Session("plotid"), CInt(sIndex) + 1, Val(oCFrom.Text), Val(oCTo.Text), distA)
                oShape.AddCrossReference(Val(oCFrom.Text), Val(oCTo.Text), distA)
            ElseIf Left(S, 3) = "PPF" Then
                sIndex = Mid(S, 4)
                oCFrom = tblCross.FindControl("PPF" & sIndex)
                oCTo = tblCross.FindControl("PPT" & sIndex)
                oCDistFeet = tblCross.FindControl("PPSF" & sIndex)
                oCDistInch = tblCross.FindControl("PPSI" & sIndex)

                distA = Val(oCDistFeet.Text) * 12 + Val(oCDistInch.Text)
                DB.Plot_UpdatePerimeter(Session("plotid"), CInt(sIndex) + 1, Val(oCFrom.Text), Val(oCTo.Text), distA)
                oShape.AddPerimieterReference(Val(oCFrom.Text), Val(oCTo.Text), distA)
            End If
        Next

        Dim oCV As CustomValidator
        Dim oRow As TableRow

        If oShape.IsValid And Page.IsValid Then
            DB.PlotUpdateStep(Session("plotid"), 3)
            Response.Redirect("step3.aspx", True)
        Else
            'Response.Write("errors")
            Dim I As Integer
            Dim oE As Exception
            For I = 0 To oShape.Errors.Count - 1
                oE = oShape.Errors(I)

                If TypeOf oE Is netplot.VectorException Or TypeOf oE Is netplot.PointException Then
                    oCV = tblPoints.FindControl("CV" & oShape.Errors(I).Index() - 1)
                    oCV.IsValid = False
                ElseIf TypeOf oE Is netplot.CrossException Then
                    oCV = tblPoints.FindControl("CVCC" & CType(oE, netplot.CrossException).Index)
                    oCV.Text = "* you are off by " & String.Format("{0:f2}", CType(oE, netplot.CrossException).Difference) & " inches."
                    oCV.IsValid = False
                ElseIf TypeOf oE Is netplot.PerimiterException Then
                    oCV = tblPoints.FindControl("CVPC" & CType(oE, netplot.PerimiterException).Index)
                    oCV.Text = "* you are off by " & String.Format("{0:f2}", CType(oE, netplot.PerimiterException).Difference) & " inches."
                    oCV.IsValid = False
                End If
            Next
        End If
    End Sub

    '- button clicks
    Private Sub btnNext_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnNext.Click
        ProcessPage()
    End Sub

    Private Sub btnSave_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnSave.Click
        ProcessPage()
    End Sub
End Class
