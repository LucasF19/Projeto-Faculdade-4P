const elementsDropdown = document.querySelectorAll(".dropdown-trigger");
const instancesDropdown = M.Dropdown.init(elementsDropdown, {
  coverTrigger: false,
});

document.addEventListener("DOMContentLoaded", function () {
  let elems = document.querySelectorAll("select");
  M.FormSelect.init(elems, options);
});

// Formatar CPF
function cpfMasc(i) {
  let cpf = document.getElementById("cpf");

  let v = i.value;
  if (isNaN(v[v.length - 1])) {
    // impede entrar outro caractere que não seja número
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";

  if (cpf.value.length < 14) {
    cpf.setCustomValidity("CPF incorreto!");
    cpf.reportValidity();
    return false;
  } else {
    cpf.setCustomValidity("");
    return true;
  }
}

// Formatar telefone fixo
function handlePhone(event) {
  let type = event.getAttribute("name");

  let input = event;
  input.value = phoneMask(input.value, type);
}

function phoneMask(value, type) {
  if (!value) return "";

  value = value.replace(/\D/g, "");

  if (type == "cellphone") {
    value = value.replace(/(\d{2})(\d)/, "($1) $2");
  }

  value = value.replace(/(\d)(\d{4})$/, "$1-$2");

  return value;
}

// Verificar se senhas são iguais
function validarSenha() {
  let senha = document.getElementById("senha");
  let senhaC = document.getElementById("confirmar-senha");

  if (senha.value != senhaC.value) {
    senhaC.setCustomValidity("As senhas não coincidem!");
    senhaC.reportValidity();
    return false;
  } else {
    senhaC.setCustomValidity("");
    return true;
  }
}

function toastAlert(message, type) {
  butterup.toast({
    message: message,
    location: "top-right",
    icon: true,
    dismissable: false,
    type: type,
  });

  localStorage.setItem(
    "toastMessage",
    JSON.stringify({ message: message, type: type })
  );
}

function displayStoredToast() {
  let storedToast = localStorage.getItem("toastMessage");

  if (storedToast) {
    storedToast = JSON.parse(storedToast);
    toastAlert(storedToast.message, storedToast.type);

    localStorage.removeItem("toastMessage");
  }
}

// Call the displayStoredToast function when the page loads
document.addEventListener("DOMContentLoaded", function () {
  displayStoredToast();
});

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
senhaC.addEventListener("input", validarSenha);

function pesquisarConsulta() {
  let search = document.getElementById("pesquisa-input");
  search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      searchData();
    }
  });

  function searchData() {
    window.location = "consulta.php?search=" + search.value;
  }
}
