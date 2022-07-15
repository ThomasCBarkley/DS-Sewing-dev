Imports System.Configuration
Imports System.Data.SqlClient
Imports netplot

Public Class step4
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

    Protected WithEvents lblPrice, lblDimension, lblThreeFeets, lblThreeFeets2 As Label
    Protected WithEvents BAC, BAWD, SPUA, LS, SPRING, SSPRING, SPRCOVER, STRAP, REINSTRIP, TAMP, LEVER, WEBBING, COVER As TextBox
    Protected WithEvents btnBuy As System.Web.UI.WebControls.Button

    '- get the price
    Public Function GetPrice(ByVal PID As String) As String
        Dim oConn As SqlConnection = New SqlConnection(ConfigurationSettings.AppSettings("sqlConnStrDsSewing").ToString()) 'New SqlClient.SqlConnection(C_CONNECTION)
        Dim oCmd As SqlCommand = New SqlCommand("select price from catalog where pid='" & PID & "'", oConn)
        Dim dPrice As Decimal = 0

        'oCmd.CommandType = CommandType.Text

        Try
            oConn.Open()
            dPrice = oCmd.ExecuteScalar()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try

        Return String.Format("{0:c}", dPrice)
    End Function



    Private Price As Decimal
    Private Height, Weight, Width As Double

    Private Sub ComputePricing()
        Dim oShape As netplot.ShapeContainer
        Dim PlotId As Integer
        Dim PointCount As Integer
        Dim I As Integer
        Dim arrD(1) As Double

        PlotId = Session("plotid")
        PointCount = Session("pointcount")

        oShape = New netplot.ShapeContainer()
        oShape.ReferenceDistance = Session("referencedistance")

        For I = 0 To PointCount - 1
            arrD = DB.PlotGetABPoint(PlotId, I + 1)
            oShape.AddPoint(arrD(0), arrD(1))
        Next

        '- price computation
        ' compute the min/max of all vectors
        ' caclulate the qty of straps required (thus the number of everything else)
        ' multiply the bits
        '-
        Dim minX, maxX, minY, maxY As Double
        Dim oArray As ArrayList
        Dim oV As netplot.Vector2D

        oArray = oShape.ComputeVectors()

        For Each oV In oArray
            If oV.X > maxX Then maxX = oV.X
            If oV.X < minX Then minX = oV.X
            If oV.Y > maxY Then maxY = oV.Y
            If oV.Y < minY Then minY = oV.Y
        Next

        Dim dsqFeet, dWidth, dHeight, fWidth, fHeight As Double
        Dim oBB As Vector2D()

        '- get the axis aligned bounding box for this pool
        oBB = netplot.geometry.ComputeAABB(oArray)

        dWidth = oBB(0).Distance(oBB(1))
        dHeight = oBB(1).Distance(oBB(2))

        'dWidth = maxX - minX
        'dHeight = maxY - minY

        fWidth = (dWidth + 24) / 12
        fHeight = (dHeight + 24) / 12


        Width = fWidth
        Height = fHeight

        dsqFeet = fWidth * fHeight
        Weight = dsqFeet / 9 * 0.375

        '- guess the price
        If PointCount > 125 Then
            Price = dsqFeet * GetPrice("PL005")
        ElseIf PointCount > 100 Then
            Price = dsqFeet * GetPrice("PL004")
        ElseIf PointCount > 75 Then
            Price = dsqFeet * GetPrice("PL003")
        ElseIf PointCount > 55 Then
            Price = dsqFeet * GetPrice("PL002")
        ElseIf PointCount > 35 Then
            Price = dsqFeet * GetPrice("PL001")
        Else
            Price = dsqFeet * GetPrice("PL000")
        End If
    End Sub


    Private Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        'Put user code to initialize the page here

        '- test for the cart sessionID cookie, this is an old hack from the unix days
        If Request.Cookies("sessionID") Is Nothing Then
            Response.Cookies("sessionID").Value = "test1234"
        End If

        If Not Me.IsPostBack Then
            ComputePricing()
            '- render to display
            WEBBING.Text = Math.Round((Width * CInt(Width / 3)) + (Height * CInt(Height / 3)))
            lblPrice.Text = String.Format("{0:c}", Price)
            lblDimension.Text = String.Format("{0:f0}x{1:f0}", Width, Height)
            lblThreeFeets.Text = 2 + 2 * (CInt((Height / 3)) + CInt((Width / 3))) : lblThreeFeets2.Text = lblThreeFeets.Text
        End If
    End Sub
End Class
