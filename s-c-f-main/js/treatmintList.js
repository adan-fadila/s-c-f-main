$(document).ready(function() {
    var id
    $(".deleteButton").on('click', function() {
        id = this.getAttribute('data-id');

        if (confirm("Are you sure you want to delete this data?")) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'db/treatmentListAction.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
            let data = 'id=' + id + '&buttonType=delete';
            xhr.send(data);
        }
    });

    $(".editButton").click(function() {
        id = this.getAttribute('data-id');
        console.log("clicked");
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
            console.log("modal");
        })

    });
    $("#sendMessageButton").click(function() {
        if (confirm("Are you sure you want to send ?")) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'db/treatmentListAction.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
            let message = document.getElementById('message-text');
            var formData = '&message-text=' + message.value;
            let data = formData + '&buttonType=edit&id=' + id;
            xhr.send(data);

        };
    });

})