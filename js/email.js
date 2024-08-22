//1_ using Emailjs to resive email 
// 2_using this script in (contactUs) files


function sendMail() {
    var params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    };

    const serviceID = "service_e70ow4p";
    const templateID = "template_h1suyrl";

    emailjs.send(serviceID, templateID, params)
        .then(res => {
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            document.getElementById("message").value = "";

            // Show the success message
            const successMessage = document.getElementById("success-message");
            successMessage.style.display = "block"; // Display the message

            console.log(res);

            // You can optionally hide the message after a few seconds
            setTimeout(() => {
                successMessage.style.display = "none"; // Hide the message
            }, 5000); // Hide after 5 seconds (adjust as needed)
        })
        .catch(err => console.log(err));
}