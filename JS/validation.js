function formValidate() {

    var sname = document.getElementById("sname").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var gender = document.getElementById("gender").value;
    var address = document.getElementById("address").value;
    var friend = document.getElementById("friend").value;
    var dob = document.getElementById("dob").value;

    // Validation for Student Name
    var nameRegex = /^[a-zA-Z\s]{3,50}$/;
    if (!nameRegex.test(sname)) {
        alert("Please Enter Your Full Name.\nName must contain only letters and Spaces.");
        document.myForm.sname.focus();
        document.myForm.sname.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.sname.focus();
        document.myForm.sname.style.border = "2px solid #2476c8";
    }


    // Validation for email: a basic email format check
    var emailRegex = /^[A-Za-z0-9._]{3,}@[A_Za-z]{3,}[.]{1}[A-Za-z.]{2,6}/;
    if (!emailRegex.test(email)) {
        alert("Invalid email address");
        document.myForm.email.focus();
        document.myForm.email.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.email.focus();
        document.myForm.email.style.border = "2px solid #2476c8";
    }


    // Validation for user mobile number
    var mobnoRegex = /^[0-9]+$/;
    if (!mobnoRegex.test(mobile)) {
        alert("Enter valid mobile number.");
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "solid 2px red";
        return false;
    }
    else if (mobile == "" || mobile.length < 10) {
        alert("Please provide valid mobile number");
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "2px solid #2476c8";
    }

    // validation for date of birth
    // Regular expression to validate date format (YYYY-MM-DD or MM/DD/YYYY)
    var dateRegex = /^(19|20)\d\d[- /.](0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])$|(0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;

    // Split the date into components (year, month, day)
    var dateComponents = dob.split(/[-/ ]/);
    var year = parseInt(dateComponents[0]);
    var month = parseInt(dateComponents[1]);
    var day = parseInt(dateComponents[2]);

    if (!dateRegex.test(dob)) {
        alert("Please enter a valid date of birth in the format DD/MM/YYYY.");
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "solid 2px red";
        return false;
    }
    // Validate the year, month, and day
    else if (year < 1900 || year > new Date().getFullYear() || month < 1 || month > 12 || day < 1 || day > 31) {
        alert("Please enter a valid date of birth.");
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "2px solid #2476c8";
    }


    // Validation for password: at least 8 characters long, containing at least one uppercase letter, one lowercase letter, and one number
    var passwordRegex = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{8,15}$/;
    if (!passwordRegex.test(pass)) {
        alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
        document.myForm.pass.focus();
        document.myForm.pass.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.pass.focus();
        document.myForm.pass.style.border = "2px solid #2476c8";
    }

    // Gender Validation
    if (gender == "") {
        alert("Please select your Gender.");
        document.myForm.gender.focus();
        document.myForm.gender.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.gender.focus();
        document.myForm.gender.style.border = "2px solid #2476c8";
    }

    // validation for address
    if (address.trim() === "") {
        alert("Please enter your address.");
        document.myForm.address.focus();
        document.myForm.address.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.address.focus();
        document.myForm.address.style.border = "2px solid #2476c8";
    }

    // Validation for user first name
    var userfriendRegex = /^[a-zA-Z]{3,20}$/;
    if (!userfriendRegex.test(friend)) {
        alert("Friend name must be 3-20 characters long and contain only letters.");
        document.myForm.friend.focus();
        document.myForm.friend.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.friend.focus();
        document.myForm.friend.style.border = "2px solid #2476c8";
    }

    alert("Please Remember Your Password for SignIn...\nPassword is " + pass);
    return true; // Form is valid, allow submission

}

function staffCreate() {
    var designation = document.getElementById("designation").value;
    var address = document.getElementById("address").value;
    var name = document.getElementById("name").value;
    var doj = document.getElementById("doj").value;
    var mobile = document.getElementById("mobile").value;
    var dob = document.getElementById("dob").value;
    var experience = document.getElementById("experience").value;
    var gender = document.getElementById("gender").value;
    var pass = document.getElementById("pass").value;
    
    // Designation Validation
    if (designation == "") {
        alert("Please Select Staff Designation.");
        document.myForm.designation.focus();
        document.myForm.designation.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.designation.focus();
        document.myForm.designation.style.border = "1px solid grey";
    }
    
    // validation for address
    if (address.trim() === "") {
        alert("Please Enter Staff Address.");
        document.myForm.address.focus();
        document.myForm.address.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.address.focus();
        document.myForm.address.style.border = "1px solid grey";
    }

    // Validation for Staff Name
    var nameRegex = /^[a-zA-Z\s]{3,50}$/;
    if (!nameRegex.test(name)) {
        alert("Please Enter Staff Full Name.\nName must contain only letters and Spaces.");
        document.myForm.name.focus();
        document.myForm.name.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.name.focus();
        document.myForm.name.style.border = "1px solid grey";
    }

    // Validation for user mobile number
    var mobileRegex = /^[0-9]+$/;
    if (!mobileRegex.test(mobile)) {
        alert("Enter valid Mobile Number.");
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "solid 2px red";
        return false;
    }
    else if (mobile == "" || mobile.length < 10) {
        alert("Please provide valid Mobile Number");
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.mobile.focus();
        document.myForm.mobile.style.border = "1px solid grey";
    }

    // Gender Validation
    if (gender == "") {
        alert("Please Select Staff Gender.");
        document.myForm.gender.focus();
        document.myForm.gender.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.gender.focus();
        document.myForm.gender.style.border = "1px solid grey";
    }

    // validation for date of birth
    // Regular expression to validate date format (YYYY-MM-DD or MM/DD/YYYY)
    var dateRegex = /^(19|20)\d\d[- /.](0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])$|(0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;

    // Split the date into components (year, month, day)
    var dateComponents = dob.split(/[-/ ]/);
    var year = parseInt(dateComponents[0]);
    var month = parseInt(dateComponents[1]);
    var day = parseInt(dateComponents[2]);

    if (!dateRegex.test(dob)) {
        alert("Please enter a valid Date of Birth in the format DD/MM/YYYY.");
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "solid 2px red";
        return false;
    }
    // Validate the year, month, and day
    else if (year < 1900 || year > new Date().getFullYear() || month < 1 || month > 12 || day < 1 || day > 31) {
        alert("Please enter a valid Date of Birth.\Staff can\'t come from future");
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.dob.focus();
        document.myForm.dob.style.border = "1px solid grey";
    }

    // Validation for Experience
    var userfriendRegex = /^[a-zA-Z0-9\s]+$/;
    if (!userfriendRegex.test(experience)) {
        alert("Provide Staff Experience.\nIt must contain only Numbers, Letters and Spaces.");
        document.myForm.experience.focus();
        document.myForm.experience.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.experience.focus();
        document.myForm.experience.style.border = "1px solid grey";
    }

    // validation for Date of Birth
    // Regular expression to validate date format (YYYY-MM-DD or MM/DD/YYYY)
    var dateRegex = /^(19|20)\d\d[- /.](0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])$|(0[1-9]|1[0-2])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;

    if (!dateRegex.test(doj)) {
        alert("Please Enter a valid Date of Joining in the format DD/MM/YYYY.");
        document.myForm.doj.focus();
        document.myForm.doj.style.border = "solid 2px red";
        return false;
    } else {
        document.myForm.doj.focus();
        document.myForm.doj.style.border = "1px solid grey";
    }


    // Validation for password: at least 8 characters long, containing at least one uppercase letter, one lowercase letter, and one number
    var passwordRegex = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{8,15}$/;
    if (!passwordRegex.test(pass)) {
        alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
        document.myForm.pass.focus();
        document.myForm.pass.style.border = "solid 2px red";
        return false;
    }
    else {
        document.myForm.pass.focus();
        document.myForm.pass.style.border = "1px solid grey";
    }

    return true;

}