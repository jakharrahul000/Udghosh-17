<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div style="margin:20px auto;width: 500px;">
        <table id="jsonTable" border="1" style="border-collapse:collapse;" cellpadding="5">
        </table>
        <script type="text/javascript">
            function addAllColumnHeaders(myList) {
                var columnSet = [];
                var headerTr$ = $('<tr/>');

                for (var i = 0; i < myList.length; i++) {
                    var rowHash = myList[i];
                    for (var key in rowHash) {
                        if ($.inArray(key, columnSet) == -1) {
                            columnSet.push(key);
                            headerTr$.append($('<th/>').html(key));
                        }
                    }
                }
                $("#jsonTable").append(headerTr$);

                return columnSet;
            }

            $.getJSON("http://udghosh.org/Register/user_data.php", function (data) {
                var columns = addAllColumnHeaders(data);

                for (var i = 0; i < data.length; i++) {
                    var row$ = $('<tr/>');
                    for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                        var cellValue = data[i][columns[colIndex]];

                        if (cellValue == null) { cellValue = ""; }

                        row$.append($('<td/>').html(cellValue));
                    }
                    $("#jsonTable").append(row$);
                }
            });

       
        </script>
    </div>
    </form>
</body>
</html>
