<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="EditProfile.aspx.cs" Inherits="LabWork.EditProfilePage" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <title>Edit Profile</title>
</asp:Content>

<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    Name<br />
    <asp:TextBox ID="NameTextBox" runat="server"></asp:TextBox>
    <br />
    <br />
    Email<br />
    <asp:TextBox ID="EmailTextBox" runat="server"></asp:TextBox>
    <br />
    <br />
    Age<br />
    <asp:TextBox ID="AgeTextBox" runat="server"></asp:TextBox>
    <br />
    <br />
    Occupation<br />
    <asp:DropDownList ID="OccupationDropDownList" runat="server">
        <asp:ListItem>Student</asp:ListItem>
        <asp:ListItem>Teacher</asp:ListItem>
        <asp:ListItem>Doctor</asp:ListItem>
        <asp:ListItem>Engineer</asp:ListItem>
    </asp:DropDownList>
    <br />
    <br />
    Sex<br />
    <asp:RadioButtonList ID="SexRadioButtonList" runat="server">
        <asp:ListItem>Male</asp:ListItem>
        <asp:ListItem>Female</asp:ListItem>
        <asp:ListItem>Other</asp:ListItem>
    </asp:RadioButtonList>
    <br />
    Send to profile page
    <asp:CheckBox ID="ProfileCheckBox" runat="server" />
    <br />
    <br />
    <asp:Button CssClass="btn btn-success" ID="SubmitButton" runat="server" OnClick="SubmitButton_Click" Text="Submit" />
    <br />
    <br />
    <asp:Label ID="InfoLabel" runat="server"></asp:Label>
</asp:Content>
