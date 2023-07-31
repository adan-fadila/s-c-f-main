const table = document.getElementById("unsolvedRequestTable");
// if (table == null) {
//     table = document.getElementById("solvedRequestTable");
// }
// const rows = table.getElementsByTagName("tr");
// Function to handle the row click event with the request ID
function handleRowClick(requestId, patientId) {
    // You can now use the "requestId" variable as needed
    // For example, navigate to a specific page with the request ID as a query parameter
    const queryString = `?requestId=${encodeURIComponent(requestId)}&patientId=${encodeURIComponent(patientId)}`;

    window.location.href = "unslovedRequest.php" + queryString;
}