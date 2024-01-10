var pathname = window.location.pathname;

//getSeoHeader(pathname);

function getSeoHeader(link) {
    var form_data = {};   
    form_data['Link'] = link;  
    var urlFile = '/GetSeoHeader';
    getResult = postData(urlFile, form_data);
    console.log(getResult);
}

function postData(link, myFormData)
{
    var getKey = [];
    var getValue = [];
    var resultData = null;
    var form_data = new FormData();
    getKey = Object.keys(myFormData);
    getValue = Object.values(myFormData);
    for(key=0; key<getKey.length; key++)
    {
        form_data.append(getKey[key], getValue[key]);
    }
    
    $.ajax({
        type: 'POST',  
        url: link,
        cache: false,
        contentType: false,
        processData: false,
        async:false,
        data: form_data,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') 
        },
        success: function(php_script_response){
            resultData = php_script_response;
        },
        error: function (request, status, error) {
            var jsonValue = JSON.parse( request.responseText );           
            resultData = "Failed, " + jsonValue.message;
        }
    });
    return resultData;
}