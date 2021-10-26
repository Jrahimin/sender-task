$(document).ready(function(){
   let data = ['pen', 'diary', 'book', 'calculator', 'pencil', 'eraser'];

   generateHtml(data);

   $("#sort").click(function () {
      data = data.sort();

      generateHtml(data);
   });

   $("#filter").click(function () {
      let filterData = '';
      let key = $("#filterTxt").val();

      filterData = data.filter(item=>{
         return item === key;
      });


      if(filterData && filterData != '')
         alert("Found filtered item "+filterData);
      else
         alert("filtered item : "+key+" is not found");
   });

   $("#map").click(function () {
      let mappedData = '';

      mappedData = data.map(item=>{
         return item+' (mapped)';
      });

      generateHtml(mappedData);
   });

   $("#reduce").click(function () {
      reducedStr = data.reduce(function (item, next) {
         return item+', '+next;
      });

      alert("Reduced to : "+reducedStr);
   });

   function generateHtml(data) {
      $("#listDiv").html('');

      let htmlStr = `<ul>`;

      data.forEach(function (item) {
         htmlStr += `<li>`+item+`</li>`;
      });

      htmlStr += `</ul>`;

      $("#listDiv").html(htmlStr);
   }
});