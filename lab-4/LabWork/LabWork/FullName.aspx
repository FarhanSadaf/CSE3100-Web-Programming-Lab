<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="FullName.aspx.cs" Inherits="LabWork.FullNameWebForm" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            Enter your first name&nbsp;
            <asp:TextBox ID="FirstNameTextBox" runat="server"></asp:TextBox>
            <br />
            <br />
            Enter your last name&nbsp;
            <asp:TextBox ID="LastNameTextBox" runat="server"></asp:TextBox>
            <br />
            <br />
            <asp:Button ID="DisplayButton" runat="server" OnClick="DisplayButton_Click" Text="Display" />
&nbsp;
            <asp:Button ID="ClearButton" runat="server" OnClick="ClearButton_Click" Text="Clear" />
            <br />
            <br />
            <asp:Label ID="FullNameLabel" runat="server"></asp:Label>
        </div>
    </form>
</body>
</html>
