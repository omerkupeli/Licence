function loadTable() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "https://www.mecallapi.com/api/users");
    xhttp.send();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        var trHTML = "";
        const objects = JSON.parse(this.responseText);
        for (let object of objects) {
          trHTML += "<tr>";
          trHTML += "<td>" + object["id"] + "</td>";
          trHTML +=
            '<td><img width="50px" src="' +
            object["avatar"] +
            '" class="avatar"></td>';
          trHTML += "<td>" + object["fname"] + "</td>";
          trHTML += "<td>" + object["lname"] + "</td>";
          trHTML += "<td>" + object["username"] + "</td>";
          trHTML +=
            '<td><button type="button" class="btn btn-outline-secondary" onclick="showUserEditBox(' +
            object["id"] +
            ')">Edit</button>';
          trHTML +=
            '<button type="button" class="btn btn-outline-danger" onclick="userDelete(' +
            object["id"] +
            ')">Del</button></td>';
          trHTML += "</tr>";
        }
        document.getElementById("mytable").innerHTML = trHTML;
      }
    };
  }
  
  loadTable();
  function showUserCreateBox() {
    Swal.fire({
      title: "Create user",
      html:
    '<form id="registrationForm" method="POST" action="{{ route("createLicence") }}">' +
    '@csrf' +
    '<input id="id" type="hidden" name="id">' +
    '<input id="licence_name" class="swal2-input" placeholder="Lisans Adı" name="licence_name">' +
    '<input id="name" class="swal2-input" placeholder="İsim" name="name">' +
    '<input id="surname" class="swal2-input" placeholder="Soyisim" name="surname">' +
    '<input id="email" class="swal2-input" placeholder="Email" name="email">' +
    '<input id="purchase_date" class="swal2-input" placeholder="Alış Tarihi" name="purchase_date">' +
    
    '<button type="submit">Kayıt</button>' +
    '</form>',
    
        
      focusConfirm: false,
      preConfirm: () => {
        userCreate();
      },
    });
  }
  
  function userCreate() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "https://www.mecallapi.com/api/users");
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(
      JSON.stringify({
        fname: document.getElementById("fname").value,
        lname: document.getElementById("lname").value,
        username: document.getElementById("username").value,
        password: document.getElementById("password").value,
        avatar: document.getElementById("avatar").value,
      })
    );
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 201) {
        loadTable();
      }
    };
  }