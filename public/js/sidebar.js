const currentUrl = window.location.href;
const url1 = 'http://localhost/mvclsnfprpoject/public/'
const url2 = 'http://localhost/mvclsnfprpoject/public/employe'
const url3 = 'http://localhost/mvclsnfprpoject/public/admin'
const url4 = 'http://localhost/mvclsnfprpoject/public/employe/detail'



if (currentUrl == url1 ) {

  let element = document.getElementById('dashboard');
  element.classList.add('active');

} else if (currentUrl.includes(url2) ) {

  let element = document.getElementById('employe');
  element.classList.add('active');

} else if (currentUrl.includes(url3) ) {

  let element = document.getElementById('admin');
  element.classList.add('active');

} else if (currentUrl.includes(url4) ) {

  let element = document.getElementById('employe');
  element.classList.add('active');

}else{
 
}