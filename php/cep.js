function consultarCEP() {
  var cep = document.getElementById('cep').value;
  var url = 'https://viacep.com.br/ws/' + cep + '/json/';

  $.ajax({
    url: url,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      if (!data.erro) {
        document.getElementById('logradouro').value = data.logradouro;
        document.getElementById('bairro').value = data.bairro;
        document.getElementById('cidade').value = data.localidade;
        document.getElementById('uf').value = data.uf;
      } else {
        alert('CEP não encontrado.');
      }
    },
    error: function() {
      alert('Ocorreu um erro na consulta do CEP.');
    }
  });
}

  function validarCPF() {
    let cpf = document.getElementById('cpf').value;

    cpf = cpf.replace(/[^\d]/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11) {
      document.getElementById('validar').innerText = 'CPF inválido';
      
      return;
    }

    // Verifica se todos os dígitos são iguais, o que resultaria em um CPF inválido
    if (/^(\d)\1{10}$/.test(cpf)) {
      document.getElementById('validar').innerText = 'CPF inválido';
     
      return;
    }

    // Calcula o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
      soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let resto = soma % 11;
    let dv1 = (resto < 2) ? 0 : 11 - resto;

    // Calcula o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
      soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = soma % 11;
    let dv2 = (resto < 2) ? 0 : 11 - resto;
  
     // Verifica se os dígitos verificadores calculados são iguais aos dígitos verificadores do CPF
     if (dv1 == cpf.charAt(9) && dv2 == cpf.charAt(10)) {
        document.getElementById('validar').innerText = 'CPF válido';
      } else {
        document.getElementById('validar').innerText = 'CPF inválido';
        
      }
    }
  
  // Exemplo de uso:
  let cpf = '123.456.789-00';
  if (validarCPF(cpf)) {
   document.getElementById('validar').innerText = 'CPF valido';
  } else {
   document.getElementById('validar').innerText= 'CPF invalido';
   
  }
  