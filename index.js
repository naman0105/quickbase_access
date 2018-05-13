

// const quickbase = new QuickBase({
//     realm: 'www',
//     appToken: 'h5x299cur9ru4by33a2aca6vppi',
//     // userToken: '*****'
// });

// quickbase.api('API_Authenticate', {
//     username: 'naman0105',
//     password: 'helloworld1'
//   }).then((result) => {
//       console.log(result);
//       return quickbase.api('API_DoQuery', {
//           dbid: 'bnpjxg2nr',
//           clist: '3.12',
//           options: 'num-5'
//       }).then((result) => {
//         console.log(result);
//           // return result.table.records;
//       });
//   })


function getDataFromQuickbase(username, password){
  var settings = {
      "async": true,
      "crossDomain": true,
      "type": "get",
      'Access-Control-Allow-Origin': '*',
      "url": "https://namanbansal.quickbase.com/db/main?a=API_Authenticate&username="+username+"&password="+password+"&hours=24",
      "method": "GET",
      "headers": {
        "cache-control": "no-cache",
        "postman-token": "6ddcce89-e315-1916-b1a1-bed2d318d37e"
      }
    }

    $.ajax(settings).done(function (response) {
      console.log(response);
      var ticket;
      $(response).find('qdbapi').each(function(){
          ticket = $(this).find("ticket").text()
          console.log(ticket);
      });
      var settings1 = {
          "async": true,
          "crossDomain": true,
          "Access-Control-Allow-Headers": "x-requested-with",
          "url": "https://namanbansal.quickbase.com/db/bnpjxg2nr?a=API_DoQuery&includeRids=1&ticket="+ticket+"&apptoken=h5x299cur9ru4by33a2aca6vppi&udata=mydata&query&clist=5.6.7.22.3&slist=3&options=num-4.nosort.skp-10.onlynew&fmt=structured",
          "method": "GET",
          "headers": {
            "cache-control": "no-cache",
            "postman-token": "9b004a9c-9ba1-7a29-739a-9950736542e3"
          }
        }
        
        $.ajax(settings1).done(function (response) {
          console.log(response);
          var table = $("#resulttable1");
          var resultHtml = '';
          var count = 1;
          resultHtml += ["<tr>", 
          "<td>", 
           ('#'),
          "</td>",
          "<td>",
          "name",
          "</td>",
          "<td>",
          "technology",
          "</td>",
          '</tr>'].join("\n");
          $(response).find('dbinfo').each(function(){
              var name = $(this).find("name").text();
              document.getElementById("table2").innerHTML = name;
              console.log(name);
          });
          $(response).find('record').each(function(){
              var name = $(this).find("name").text()
              var technology = $(this).find("technology").text()
              console.log(name + " " + technology);
              resultHtml += ["<tr>", 
              "<td>", 
               (count),
              "</td>",
              "<td>",
              name,
              "</td>",
              "<td>",
              technology,
              "</td>",
              '</tr>'].join("\n");
              table.html(resultHtml);
              count++;
          });
        });

        var settings2 = {
          "async": true,
          "crossDomain": true,
          "Access-Control-Allow-Headers": "x-requested-with",
          "url": "https://namanbansal.quickbase.com/db/bnpkmvcr3?a=API_DoQuery&includeRids=1&ticket="+ticket+"&apptoken=h5x299cur9ru4by33a2aca6vppi&udata=mydata&query&clist=5.6.7.22.3&slist=3&options=num-4.nosort.skp-10.onlynew&fmt=structured",
          "method": "GET",
          "headers": {
            "cache-control": "no-cache",
            "postman-token": "9b004a9c-9ba1-7a29-739a-9950736542e3"
          }
        }
        
        $.ajax(settings2).done(function (response) {
          console.log(response);
          var table = $("#resulttable");
          var resultHtml = '';
          var count = 1;
          resultHtml += ["<tr>", 
          "<td>", 
           ('#'),
          "</td>",
          "<td>",
          "title",
          "</td>",
          "<td>",
          "description",
          "</td>",
          '</tr>'].join("\n");
          $(response).find('dbinfo').each(function(){
              var name = $(this).find("name").text();
              document.getElementById("table1").innerHTML = name;
              console.log(name);
          });
          $(response).find('record').each(function(){
              var name = $(this).find("title").text()
              var technology = $(this).find("description").text()
              console.log(name + " " + technology);
              resultHtml += ["<tr>", 
              "<td>", 
               (count),
              "</td>",
              "<td>",
              name,
              "</td>",
              "<td>",
              technology,
              "</td>",
              '</tr>'].join("\n");
              table.html(resultHtml);
              count++;
          });
        });
    });
}


//   the urls used to receive the queries
//   https://namanbansal.quickbase.com/db/bnpjxg2nr?a=API_DoQuery&includeRids=1&ticket=9_bnpn4fejp_b3x4tj_k5sw_a_-b_c3qin97f4ceibwvn65nb5qdahndbtzt6ydusrt4rjq8vnecd6p4hm_wxpwpb&apptoken=h5x299cur9ru4by33a2aca6vppi&udata=mydata&clist=5.6.7.22.3&slist=3&options=num-4.nosort.skp-10.onlynew&fmt=structured

//   https://namanbansal.quickbase.com/db/main?a=API_Authenticate&username=naman0105&password=helloworld1&hours=24



