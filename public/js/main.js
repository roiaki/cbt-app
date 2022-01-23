// 削除確認 froms[0] ?
function confirmDelete() {
  if (window.confirm('本当に削除してもよろしいでしょうか?')) {
    document.forms[0].submit();
  } else {
    return false;
  }
}

var count = 1;

// フォーム追加
function addForm() {

  // input text要素を作成
  var input_text = document.createElement('input');
  input_text.type = 'text';
  input_text.name = 'emotion_name_[]';
  input_text.class = "form-control";
  input_text.size = '20';
  input_text.style = "margin:5px";
  input_text.id = 'inputText_' + count;
  input_text.placeholder = '感情名_' + count;
  var a = document.getElementById('form_area01');
  a.appendChild(input_text);

  // input number 要素を作成
  var input_number = document.createElement('input');
  input_number.type = 'number';
  input_number.name = 'emotion_strength_[]';
  input_number.class = "form-control";
  input_number.size = '20';
  input_number.style = "margin:5px";
  input_number.id = 'inputNumber_' + count;
  input_number.placeholder = '強さ_' + count;
  var b = document.getElementById('form_area02');
  b.appendChild(input_number);

  count++;
}

// フォーム削除
function deleteForm() {
  count = 1;
  const element01 = document.getElementById('form_area01');
  const element02 = document.getElementById('form_area02');
  element01.innerHTML = '';
  element02.innerHTML = '';
}