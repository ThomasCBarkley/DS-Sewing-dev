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
End Class
