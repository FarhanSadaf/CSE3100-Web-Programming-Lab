<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ListCourses.aspx.cs" Inherits="PracticeCourses.ListCourses" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="body" runat="server">
    <div class="container">
        <h1 class="text-center">All courses</h1>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <asp:GridView ID="CoursesGridView" CssClass="table" runat="server" AutoGenerateColumns="false" OnRowCommand="CoursesGridView_RowCommand">
                    <Columns>
                        <asp:BoundField DataField="Id" HeaderText="ID" />
                        <asp:BoundField DataField="Code" HeaderText="Code" />
                        <asp:BoundField DataField="Name" HeaderText="Name" />
                        <asp:BoundField DataField="Year" HeaderText="Year" />
                        <asp:BoundField DataField="Term" HeaderText="Term" />
                        <asp:BoundField DataField="Teacher1" HeaderText="Course Teacher 1" />
                        <asp:BoundField DataField="Teacher2" HeaderText="Course Teacher 2" />
                        <asp:TemplateField HeaderText="Actions">
                            <ItemTemplate>
                                <asp:LinkButton ID="UpdateLinkButton" CommandName="upd" CommandArgument='<%#Eval("Id") %>' runat="server">Update</asp:LinkButton>
                                <asp:LinkButton ID="DeleteLinkButton" CommandName="del" CommandArgument='<%#Eval("Id") %>' onclientclick="return confirm('Are you sure to delete?');" runat="server">Delete</asp:LinkButton>
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                </asp:GridView>
            </div>
        </div>
    </div>
</asp:Content>
