$(document).ready(function()
{
    let page_url = '<?php echo $app_url?>/';
    let project_name = '<?php echo $project_name ?>';
    $(document).on('click', 'a', function(event)
    {
        route(event);
    });
    const route = (event) => {
        event = event || window.event;
        event.preventDefault();
        window.history.pushState({}, "", event.target.href);
        handleLocation();
    }
    const routing = (path) => {
        $.ajax({
            url: page_url,
            dataType: 'json',
            method: 'POST',
            data: {
                ajaxreq: path
            },
            success: function(result){console.log(result);
                document.querySelector("#main-page").innerHTML = result.html;
                eval(result.js)
            }
        });
    }
    const handleLocation = () => {
        var path = window.location.pathname;
        path = path.replace("/"+project_name,"");
        const html = routing(path);
    };
    window.onpopstate = handleLocation;
    window.route = route;
    handleLocation();
    const tr = function() {
        return {
            capsule: function(name) {
                console.log(name);
                return this;
            },
            model: function(name) {
                console.log(name);
                return this;
            },
            load: function(name) {
                console.log(name);
                return this;
            }
        }
    }
});