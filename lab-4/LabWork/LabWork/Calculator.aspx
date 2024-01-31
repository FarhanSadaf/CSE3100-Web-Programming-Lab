<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Calculator.aspx.cs" Inherits="LabWork.Calculator" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            Enter a number
            <asp:TextBox ID="Num1TextBox" runat="server"></asp:TextBox>
            <br />
            <br />
            Enter another number
            <asp:TextBox ID="Num2TextBox" runat="server"></asp:TextBox>
            <br />
            <br />
            <asp:Button ID="AddButton" runat="server" OnClick="AddButton_Click" Text="+" />
&nbsp;<asp:Button ID="SubButton" runat="server" OnClick="SubButton_Click" Text="-" />
&nbsp;<asp:Button ID="MulButton" runat="server" OnClick="MulButton_Click" Text="*" />
&nbsp;<asp:Button ID="DivButton" runat="server" OnClick="DivButton_Click" Text="/" />
&nbsp;<asp:Button ID="ClearButton" runat="server" OnClick="ClearButton_Click" Text="Clear" />
            <br />
            <br />
            <asp:Label ID="ResultLabel" runat="server"></asp:Label>
        </div>
    </form>
</body>
</html>
