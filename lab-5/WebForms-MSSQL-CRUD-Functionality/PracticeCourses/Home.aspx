<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Home.aspx.cs" Inherits="PracticeCourses.Home" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">

    <div class="container text-center">
        <h1 class="mt-5">Welcome!</h1>

        <div class="row mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-3"><a href="AddCourse.aspx" class="btn btn-outline-info btn-block">Add a course</a></div>
            <div class="col-md-3"><a href="ListCourses.aspx" class="btn btn-info btn-block">Show all courses</a></div>
            <div class="col-md-3"></div>
        </div>

    </div>
</asp:Content>
