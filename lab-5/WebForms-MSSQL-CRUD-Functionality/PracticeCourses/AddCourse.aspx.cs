using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace PracticeCourses
{
    public partial class AddCourse : System.Web.UI.Page
    {
        //Get connection string from web.config file  
        string strcon = ConfigurationManager.ConnectionStrings["dbconnection"].ConnectionString;

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void CourseAddButton_Click(object sender, EventArgs e)
        {
            try
            {
                //create new sqlconnection and connection to database by using connection string from web.config file  
                SqlConnection con = new SqlConnection(strcon);
                con.Open();

                // Query to insert
                SqlCommand cmd = new SqlCommand("INSERT INTO Courses ([Id], [Code], [Name], [Teacher1], [Teacher2], [Year], [Term]) VALUES(@Id, @Code, @Name, @Teacher1, @Teacher2, @Year, @Term)", con);
                
                cmd.Parameters.AddWithValue("@Id", CourseIdTextBox.Text.Trim());
                cmd.Parameters.AddWithValue("@Code", CourseCodeTextBox.Text.Trim());
                cmd.Parameters.AddWithValue("@Name", CourseNameTextBox.Text.Trim());
                cmd.Parameters.AddWithValue("@Teacher1", CourseTeacher1TextBox.Text.Trim());
                cmd.Parameters.AddWithValue("@Teacher2", CourseTeacher2TextBox.Text.Trim());
                cmd.Parameters.AddWithValue("@Year", CourseYearDropDownList.SelectedValue);
                cmd.Parameters.AddWithValue("@Term", CourseTermDropDownList.SelectedValue);

                cmd.ExecuteNonQuery();

                // Close the connection
                con.Close();

                // Success message in alerts
                Response.Write("<script>alert('Course added!');</script>");
            }
            catch (Exception ex)
            {
                // Error message in alerts
                Response.Write("<script>alert('Error: "+ ex.Message +"');</script>");
            }
        }
    }
}