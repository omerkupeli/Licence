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
    title: "Formu Doldurun",
    html: `
      <form id="registrationForm" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="id" type="hidden" name="id"> 
        <input id="licence_name" class="swal2-input" placeholder="Lisans Adı" name="licence_name"> 
        <input id="name" class="swal2-input" placeholder="İsim" name="name"> 
        <input id="surname" class="swal2-input" placeholder="Soyisim" name="surname"> 
        <input id="email" class="swal2-input" placeholder="Email" name="email"> 
        <input id="purchase_date" class="swal2-input" placeholder="Alış Tarihi" name="purchase_date"> 
        <input id="duration" class="swal2-input" placeholder="Süre" name="duration">
        <input id="end_date" class="swal2-input" placeholder="Bitiş Tarihi" name="end_date">
        
        <button type="submit">Kayıt</button> 
      </form>
    `,
    showCancelButton: false,
    preConfirm: () => {
      const form = document.getElementById("registrationForm");
      const formData = new FormData(form);
  
      return fetch(form.action, {
        method: form.method,
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          Swal.fire(data.message);
        })
        .catch(error => {
          Swal.fire("Bir hata oluştu.");
        });
    }
  }).then(result => {
    if (result.isConfirmed) {
      window.location.href = "/createLicence";
    }
  });
  
  
  
}

function KayitEkle() {
  const fname = document.getElementById("Ad").value;
  const lname = document.getElementById("Soyad").value;
  const username = document.getElementById("Kullanıcı Adı").value;
  const email = document.getElementById("email").value;

  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "https://www.mecallapi.com/api/users/create");
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhttp.send(
    JSON.stringify({
      fname: fname,
      lname: lname,
      username: username,
      email: email,
      avatar: "https://www.mecallapi.com/users/cat.png",
    })
  );
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const objects = JSON.parse(this.responseText);
      Swal.fire(objects["message"]);
      loadTable();
    }
  };
}

//Güncelleme İşlemi
function showUserEditBox(id) {
  console.log(id);
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "https://www.mecallapi.com/api/users/" + id);
  xhttp.send();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const objects = JSON.parse(this.responseText);
      const user = objects["user"];
      console.log(user);
      Swal.fire({
        title: "Edit User",
        html:
          '<input id="id" type="hidden" value=' +
          user["id"] +
          ">" +
          '<input id="fname" class="swal2-input" placeholder="First" value="' +
          user["fname"] +
          '">' +
          '<input id="lname" class="swal2-input" placeholder="Last" value="' +
          user["lname"] +
          '">' +
          '<input id="username" class="swal2-input" placeholder="Username" value="' +
          user["username"] +
          '">' +
          '<input id="email" class="swal2-input" placeholder="Email" value="' +
          user["email"] +
          '">',
        focusConfirm: false,
        preConfirm: () => {
          userEdit();
        },
      });
    }
  };
}

function userEdit() {
  const id = document.getElementById("id").value;
  const fname = document.getElementById("fname").value;
  const lname = document.getElementById("lname").value;
  const username = document.getElementById("username").value;
  const email = document.getElementById("email").value;

  const xhttp = new XMLHttpRequest();
  xhttp.open("PUT", "https://www.mecallapi.com/api/users/update");
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhttp.send(
    JSON.stringify({
      id: id,
      fname: fname,
      lname: lname,
      username: username,
      email: email,
      avatar: "https://www.mecallapi.com/users/cat.png",
    })
  );
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const objects = JSON.parse(this.responseText);
      Swal.fire(objects["message"]);
      loadTable();
    }
  };
}

//Silme İşlemi
function userDelete(id) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("DELETE", "https://www.mecallapi.com/api/users/delete");
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhttp.send(
    JSON.stringify({
      id: id,
    })
  );
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      const objects = JSON.parse(this.responseText);
      Swal.fire(objects["message"]);
      loadTable();
    }
  };
}

$('.mesaj a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
