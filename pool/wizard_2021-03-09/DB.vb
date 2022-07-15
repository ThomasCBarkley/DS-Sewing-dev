Imports System.Data.SqlClient
Imports System.Data
Imports System.Configuration

Public Class DB

    Public Shared Function GetConnection() As Data.SqlClient.SqlConnection

        Dim oConn As SqlConnection
        oConn = New SqlConnection
        oConn.ConnectionString = C_CONNECTION
        Return oConn
    End Function

    Public Shared Function PlotGet(ByVal plotid As Integer) As SqlDataReader
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand
        Dim oDR As SqlDataReader

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_GetByID", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid

        Try
            oConn.Open()
            oDR = oCmd.ExecuteReader(CommandBehavior.CloseConnection)
        Catch E As Exception
            Throw E
        Finally
            oCmd = Nothing
        End Try

        Return oDR
    End Function


    Public Shared Function PlotGetPerimPoint(ByVal plotid As Integer, ByVal plotindex As Integer) As netplot.PerimeterPoint
        Dim oPP As New netplot.PerimeterPoint

        oPP.Distance = 0
        oPP.FromIndex = 0
        oPP.ToIndex = 0

        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand
        Dim oDR As SqlDataReader

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_GetPerimPoint", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex

        Try
            oConn.Open()
            oDR = oCmd.ExecuteReader()

            If oDR.Read Then
                oPP.Distance = oDR("crossdistance")
                oPP.FromIndex = oDR("fromindex")
                oPP.ToIndex = oDR("toindex")
            End If

        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try

        Return oPP
    End Function


    Public Shared Function PlotGetCrossPoint(ByVal plotid As Integer, ByVal plotindex As Integer) As netplot.CrossPoint
        Dim oCP As New netplot.CrossPoint

        oCP.Distance = 0
        oCP.FromIndex = 0
        oCP.ToIndex = 0

        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand
        Dim oDR As SqlDataReader

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_GetCrossPoint", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex

        Try
            oConn.Open()
            oDR = oCmd.ExecuteReader()

            If oDR.Read Then
                oCP.Distance = oDR("crossdistance")
                oCP.FromIndex = oDR("fromindex")
                oCP.ToIndex = oDR("toindex")
            End If

        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try

        Return oCP
    End Function

    Public Shared Function Plot_UpdatePerimeter(ByVal plotid As Integer, ByVal plotindex As Integer, ByVal FromIndex As Integer, ByVal ToIndex As Integer, ByVal distance As Double)
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_UpdatePerim", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@from", SqlDbType.Int).Value = FromIndex
        oCmd.Parameters.Add("@to", SqlDbType.Int).Value = ToIndex
        oCmd.Parameters.Add("@distance", SqlDbType.Float).Value = distance
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex

        Try
            oConn.Open()
            oCmd.ExecuteNonQuery()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try
    End Function

    Public Shared Function Plot_UpdateCross(ByVal plotid As Integer, ByVal plotindex As Integer, ByVal FromIndex As Integer, ByVal ToIndex As Integer, ByVal distance As Double)
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_UpdateCross", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@from", SqlDbType.Int).Value = FromIndex
        oCmd.Parameters.Add("@to", SqlDbType.Int).Value = ToIndex
        oCmd.Parameters.Add("@distance", SqlDbType.Float).Value = distance
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex

        Try
            oConn.Open()
            oCmd.ExecuteNonQuery()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try
    End Function


    Public Shared Function PlotUpdateABPoint(ByVal plotid As Integer, ByVal plotindex As Integer, ByVal adist As Double, ByVal bdist As Double)
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_UpdateABPoint", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex
        oCmd.Parameters.Add("@adist", SqlDbType.Float).Value = adist
        oCmd.Parameters.Add("@bdist", SqlDbType.Float).Value = bdist

        Try
            oConn.Open()
            oCmd.ExecuteNonQuery()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try
    End Function

    Public Shared Function PlotGetABPoint(ByVal plotid As Integer, ByVal plotindex As Integer) As Double()
        Dim ABPoint(1) As Double

        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand
        Dim oDR As SqlDataReader

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_GetABPoint", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@index", SqlDbType.Int).Value = plotindex

        Try
            oConn.Open()
            oDR = oCmd.ExecuteReader()

            If oDR.Read Then
                ABPoint(0) = oDR("adist")
                ABPoint(1) = oDR("bdist")
            Else
                ABPoint(0) = 0
                ABPoint(1) = 0
            End If
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try

        Return ABPoint
    End Function

    Public Shared Function PlotUpdateStep(ByVal plotid As Integer, ByVal laststep As Integer)
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_UpdateStep", oConn)
        oCmd.CommandType = CommandType.StoredProcedure
        oCmd.Parameters.Add("@plotid", SqlDbType.Int).Value = plotid
        oCmd.Parameters.Add("@step", SqlDbType.Int).Value = laststep

        Try
            oConn.Open()
            oCmd.ExecuteNonQuery()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try
    End Function


    Public Shared Function DB2S(ByVal O As Object) As String
        If O Is Nothing Then
            Return ""
        ElseIf O Is DBNull.Value Then
            Return ""
        Else
            Return CStr(O)
        End If
    End Function

    Public Shared Function S2DB(ByVal S As String) As Object
        If S Is Nothing Then
            Return DBNull.Value
        ElseIf S = "" Then
            Return DBNull.Value
        Else
            Return S
        End If
    End Function




    Public Shared Function PlotAddNew(ByVal Name As String, ByVal Phone As String, ByVal Email As String, ByVal referenceistance As Double, ByVal pointcount As Integer, ByVal CrossCount As Integer, ByVal perimcount As Integer) As Integer
        Dim oConn As SqlConnection
        Dim oCmd As SqlCommand
        Dim plotid As Integer

        oConn = GetConnection()
        oCmd = New SqlCommand("Plot_AddNew", oConn)
        oCmd.CommandType = CommandType.StoredProcedure

        oCmd.Parameters.Add("@name", SqlDbType.VarChar, 64).Value = S2DB(Name)
        oCmd.Parameters.Add("@phone", SqlDbType.VarChar, 32).Value = S2DB(Phone)
        oCmd.Parameters.Add("@email", SqlDbType.VarChar, 256).Value = S2DB(Email)
        oCmd.Parameters.Add("@referencedistance", SqlDbType.Float).Value = referenceistance
        oCmd.Parameters.Add("@pointcount", SqlDbType.Int).Value = pointcount
        oCmd.Parameters.Add("@crosscount", SqlDbType.Int).Value = CrossCount
        oCmd.Parameters.Add("@perimcount", SqlDbType.Int).Value = perimcount

        Try
            oConn.Open()
            plotid = oCmd.ExecuteScalar()
        Catch E As Exception
            Throw E
        Finally
            oConn.Close()
            oConn = Nothing
            oCmd = Nothing
        End Try

        Return plotid
    End Function
End Class
