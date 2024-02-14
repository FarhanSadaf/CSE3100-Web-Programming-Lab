<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="UpdateCourse.aspx.cs" Inherits="PracticeCourses.UpdateCourse" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">

    <div class="container text-center">
        <h1>Add a course</h1>

        <div class="row">
            <div class="col-md-6 mx-auto">
                
                <div class="form-group">
                    <label for="body_CourseIdTextBox">ID</label>
                    <asp:TextBox ID="CourseIdTextBox" class="form-control" runat="server"></asp:TextBox>
                </div>

                <div class="form-group">
                    <label for="body_CourseCodeTextBox">Course code</label>
                    <asp:TextBox ID="CourseCodeTextBox" class="form-control" runat="server"></asp:TextBox>
                </div>

                <div class="form-group">
                    <label for="body_CourseNameTextBox">Course Name</label>
                    <asp:TextBox ID="CourseNameTextBox" class="form-control" runat="server"></asp:TextBox>
                </div>

                <div class="form-group">
                    <label for="body_CourseTeacher1TextBox">Course Teacher 1</label>
                    <asp:TextBox ID="CourseTeacher1TextBox" class="form-control" runat="server"></asp:TextBox>
                </div>

                <div class="form-group">
                    <label for="body_CourseTeacher2TextBox">Course Teacher 2</label>
                    <asp:TextBox ID="CourseTeacher2TextBox" class="form-control" runat="server"></asp:TextBox>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="body_CourseYearDropDownList">Year</label>
                        <asp:DropDownList CssClass="form-control" ID="CourseYearDropDownList" runat="server">
                            <asp:ListItem Value="1st">1st</asp:ListItem>
                            <asp:ListItem Value="2nd">2nd</asp:ListItem>
                            <asp:ListItem Value="3rd">3rd</asp:ListItem>
                            <asp:ListItem Value="4th">4th</asp:ListItem>
                        </asp:DropDownList>
                    </div>
                    <div class="col-md-6">
                        <label for="body_CourseTermDropDownList">Year</label>
                        <asp:DropDownList CssClass="form-control" ID="CourseTermDropDownList" runat="server">
                            <asp:ListItem Value="1st">1st</asp:ListItem>
                            <asp:ListItem Value="2nd">2nd</asp:ListItem>
                        </asp:DropDownList>
                    </div>

                    <asp:Button CssClass="m-4 btn btn-block btn-outline-success" ID="CourseAddButton" runat="server" Text="Update Course" OnClick="CourseAddButton_Click" />
                </div>
            </div>
        </div>
    </div>
</asp:Content>
