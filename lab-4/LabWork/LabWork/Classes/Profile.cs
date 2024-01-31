using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace LabWork
{
    public class Profile
    {
        public string Name { get; set; }
        public string Email { get; set; }
        public string Occupation { get; set; }
        public string Sex { get; set; }
        public Profile(string name, string email, string occupation, string sex)
        {
            Name = name;
            Email = email;
            Occupation = occupation;
            Sex = sex;
        }
        public string GetProfileInfo()
        {
            return "Name: " + Name + "<br>" +
                "Email: " + Email + "<br>" +
                "Occupation: " + Occupation + "<br>" +
                "Sex: " + Sex + "<br>";
        }
    }
}