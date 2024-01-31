using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace LabWork
{
    public partial class EditProfilePage : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }
        protected void SubmitButton_Click(object sender, EventArgs e)
        {
            Profile profile = new Profile(
                NameTextBox.Text.Trim(),
                EmailTextBox.Text.Trim(),
                OccupationDropDownList.SelectedValue,
                SexRadioButtonList.SelectedValue
                );

            // If send to profile page is checked, send the profile values using querystrings
            if (ProfileCheckBox.Checked)
            {
                Response.Redirect("Profile.aspx?name=" + profile.Name + "&email=" + profile.Email + "&occupation=" + profile.Occupation + "&sex=" + profile.Sex); ;
            }
            else
            {
                InfoLabel.Text = profile.GetProfileInfo();
            }
        }
    }
}