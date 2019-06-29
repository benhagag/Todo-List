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

  // unite function for append <tr> to table
  function appendData(data) {
    html = "";
    data.forEach(row => {
      html += `<tr id=${row.id}><td class=name contenteditable="true">${
        row.name
      }</td><td class=todo contenteditable="true">${
        row.todo
      }</td><td><button type="button" data-id=${
        row.id
      } class="btn btn-danger delete">מחיקה</button>
            </td></tr>`;
    });

    return html;
  }
});
