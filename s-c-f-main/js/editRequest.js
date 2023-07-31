$(document).on('click', '#openModalBtn', function() {
    $('#exampleModal').modal('show');
});

// Close the modal when the "Close" button inside the modal is clicked
$(document).on('click', '.modal-footer .btn-secondary', function() {
    $('#exampleModal').modal('hide');
});

// Perform actions when the "Save changes" button is clicked
$(document).ready(function() {
    const add = document.querySelector(".add");

    function addInput() {
        const index = document.getElementsByClassName('treat').length;
        let meal = document.createElement("div");
        let name = document.createElement("input");
        let btn = document.createElement("a");
        btn.href = "#";
        btn.innerHtml = "&times";
        btn.classList.add = "delete";
        name.type = "text";
        name.classList.add("meal");
        name.name = index + "-meal";
        name.placeholder = "meal";
        meal.appendChild(btn);
        meal.classList.add("treat");
        meal.appendChild(name);
        for (let i = 0; i < 3; i++) {;
            let more = document.createElement("input");
            more.type = "text";
            more.name = index + "-more";
            more.classList.add("more");
            more.placeholder = "meal content";
            meal.appendChild(more)
        }
        document.querySelector(".plan").appendChild(meal);
    }

    add.addEventListener("click", addInput);
    $('#plan-form').submit(function(event) {
        event.preventDefault();
        var form = $(this).serialize();
        formData = form.split('&')
        console.log(formData)
        const mealData = {};
        const meals = formData.filter(key => key.includes('-meal'));
        console.log(meals);
        meals.forEach(meal => {
            const row = meal.split('=');
            const mealName = row[1];
            console.log(mealName);
            const mealMoreInputs = formData.filter(input => input.slice(0, 2) === row[0].slice(0, 2) && input.includes('-more'));
            const values = mealMoreInputs.map(v => {
                const moreValue = v.split('=');
                return moreValue[1]
            });
            mealData[mealName] = values;
        })
        const patientId = formData.find(v => v.includes('patient_id'));
        const diagnosis = formData.find(v => v.includes('diagnosis'));
        const patientIdValue = patientId ? patientId.split('=')[1] : null;
        const diagnosisValue = diagnosis ? diagnosis.split('=')[1] : null;

        const data = {
            patientId: patientId[1],
            diagnosis: diagnosis[1],
            mealData
        }
        $.ajax({
            type: 'POST',
            url: 'db/editTreatment.php',
            data: form + "&treatment=" + JSON.stringify(mealData),
            success: function(data) {
                // window.location.href = 'try.php';
                // This function executes if the AJAX request is successful
                console.log('Success:', data);
            },
            error: function(xhr, status, error) {
                // This function executes if there's an error with the AJAX request
                console.error('Error:', status, error);
            }
        });
        $('#exampleModal').modal('hide');
    });
});