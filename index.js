$(document).ready(function() {
  const urlApi = "http://localhost:8080/matrixx/back";
  // on page load !
  $.ajax({
    type: "GET",
    url: urlApi,
    success: function(result) {
      let htmlToAppend = appendData(result);
      $("#tbody").append(htmlToAppend);
    },
    error: function(result) {
      alert("מצטערים משהו לא עובד אנא נסה שוב מאוחר יותר");
    }
  });
});
