using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace PracticeCourses
{
    public partial class UpdateCourse : System.Web.UI.Page
    {
        //Get connection string from web.config file  
        string strcon = ConfigurationManager.ConnectionStrings["dbconnection"].ConnectionString;

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!this.IsPostBack)
            {
                string id = Request.QueryString["id"].Trim();
                Console.WriteLine(id);
                try
                {
                    //create new sqlconnection and connection to database by using connection string from web.config file  
                    SqlConnection con = new SqlConnection(strcon);

                    if (con.State == ConnectionState.Closed)
                    {
                        con.Open();
                    }

                    // Query to insert
                    SqlCommand cmd = new SqlCommand(String.Format("SELECT * FROM Courses WHERE id={0}", id), con);
                    SqlDataReader sdr = cmd.ExecuteReader();

                    if (sdr.HasRows)
                    {
                        sdr.Read();

                        CourseIdTextBox.Text = sdr.GetValue(0).ToString();
                        CourseCodeTextBox.Text = sdr.GetValue(1).ToString();
                        CourseNameTextBox.Text = sdr.GetValue(2).ToString();
                        CourseYearDropDownList.SelectedValue = sdr.GetValue(3).ToString();
                        CourseTermDropDownList.SelectedValue = sdr.GetValue(4).ToString();
                        CourseTeacher1TextBox.Text = sdr.GetValue(5).ToString();
                        CourseTeacher2TextBox.Text = sdr.GetValue(6).ToString();

                    }

                    // Close the connection
                    con.Close();
                }
                catch (Exception ex)
                {
                    // Error message in alerts
                    Response.Write("<script>alert('Error: " + ex.Message + "');</script>");
                }
            }
        }

        protected void CourseAddButton_Click(object sender, EventArgs e)
        {
            try
            {
                //create new sqlconnection and connection to database by using connection string from web.config file  
                SqlConnection con = new SqlConnection(strcon);

                if (con.State == ConnectionState.Closed)
                {
                    con.Open();
                }

                SqlCommand cmd = new SqlCommand("UPDATE Courses SET Id=@Id, Code=@Code, Name=@Name, Teacher1=@Teacher1, Teacher2=@Teacher2, Year=@Year, Term=@Term WHERE Id=@Id", con);

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


                // Error message in alerts
                Response.Redirect("~/ListCourses.aspx");

            }
            catch (Exception ex)
            {
                // Error message in alerts
                Response.Write("<script>alert('Error: " + ex.Message + "');</script>");
            }
        }
    }
}