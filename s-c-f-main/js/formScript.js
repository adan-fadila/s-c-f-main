let currentTab = 0;

window.onload = function() {
    showTab(currentTab);
};

function showTab(n) {
    // This function will display the specified tab of the form...
    let x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    let x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        var formData = $("#regForm").serialize();
        // Make an AJAX POST request
        $.ajax({
            type: 'POST', // Use 'POST' method since you want to send data to the server
            url: 'db/getForm.php',
            data: formData,
            success: function(response) {
                // Handle the server response here (if needed)
                console.log('Success:', response);
                // window.location.href = 'request_treatment.php';
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here (if needed)
                console.log('Error:', textStatus, errorThrown);
            }

        });
        window.location.href = 'patientHome.php';
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}



function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    let i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}