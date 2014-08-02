<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ seoTitle }}</title>
    <meta name="description" content="{{ seoDescription }}">
    <meta name="keywords" content="{{ seoKeywords }}">
    {{ assets.outputCss('remoteStyles') }}
    {{ assets.outputCss('localStyles') }}
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
{% block content %}
{% endblock %}
{{ assets.outputJs('remoteJs') }}
{{ assets.outputJs('localJs') }}
</body>
</html>