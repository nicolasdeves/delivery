function validarCPF() {
    const cpf = document.getElementById("cpf").value.replace(/[^\d]+/g, '');

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        mostrarErroCPF();
        return false;
    }

    let soma = 0;
    let resto;

    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }

    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) {
        mostrarErroCPF();
        return false;
    }

    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    }

    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) {
        mostrarErroCPF();
        return false;
    }

    ocultarErroCPF();
    return true;
}

function mostrarErroCPF() {
    document.getElementById("cpf-error").style.display = "block";
}

function ocultarErroCPF() {
    document.getElementById("cpf-error").style.display = "none";
}

function validarTelefone() {
    const telefone = document.getElementById("telefone").value.replace(/[^\d]+/g, '');

    // Verifica se o telefone tem 11 dígitos e começa com '9' para celulares
    if (telefone.length !== 11 || telefone[2] !== '9') {
        console.log("Telefone inválido: precisa ter 11 dígitos e começar com 9");
        mostrarErroTelefone();
        return false;
    }

    ocultarErroTelefone();
    console.log("Telefone válido");
    return true;
}

function mostrarErroTelefone() {
    document.getElementById("telefone-error").style.display = "block";
}

function ocultarErroTelefone() {
    document.getElementById("telefone-error").style.display = "none";
}
