using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace LabWork
{
    public partial class Calculator : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void AddButton_Click(object sender, EventArgs e)
        {
            ResultLabel.Text = Convert.ToString(Convert.ToDouble(Num1TextBox.Text) + Convert.ToDouble(Num2TextBox.Text));
        }

        protected void SubButton_Click(object sender, EventArgs e)
        {
            ResultLabel.Text = Convert.ToString(Convert.ToDouble(Num1TextBox.Text) - Convert.ToDouble(Num2TextBox.Text));
        }

        protected void MulButton_Click(object sender, EventArgs e)
        {
            ResultLabel.Text = Convert.ToString(Convert.ToDouble(Num1TextBox.Text) * Convert.ToDouble(Num2TextBox.Text));
        }

        protected void DivButton_Click(object sender, EventArgs e)
        {
            ResultLabel.Text = Convert.ToString(Convert.ToDouble(Num1TextBox.Text) / Convert.ToDouble(Num2TextBox.Text));
        }

        protected void ClearButton_Click(object sender, EventArgs e)
        {
            ResultLabel.Text = "";
        }
    }
}