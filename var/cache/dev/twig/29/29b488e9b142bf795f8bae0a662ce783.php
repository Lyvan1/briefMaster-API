<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* emails/confirmationSubscription_request.html.twig */
class __TwigTemplate_1a348968518747790e46ee70c2e44cd9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/confirmationSubscription_request.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Subscription Request</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css');
    </style>
</head>
<body class=\"bg-gray-100\">
<div class=\"max-w-lg mx-auto p-6 bg-white shadow-md rounded-md\">
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">You've sent a subscription Request.</h1>
    <p class=\"mt-4 text-gray-700\">Hello, you're a step ahead from working with us.  </p>

    <p class=\"mt-4 text-gray-700\">We will create a user account and keep you up to date.  </p>
    <p class=\"mt-4 text-gray-700\">Best regards,</p>
    <p class=\"text-gray-700\">The BriefMaster Team</p>
</div>
</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "emails/confirmationSubscription_request.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Subscription Request</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css');
    </style>
</head>
<body class=\"bg-gray-100\">
<div class=\"max-w-lg mx-auto p-6 bg-white shadow-md rounded-md\">
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">You've sent a subscription Request.</h1>
    <p class=\"mt-4 text-gray-700\">Hello, you're a step ahead from working with us.  </p>

    <p class=\"mt-4 text-gray-700\">We will create a user account and keep you up to date.  </p>
    <p class=\"mt-4 text-gray-700\">Best regards,</p>
    <p class=\"text-gray-700\">The BriefMaster Team</p>
</div>
</body>
</html>
", "emails/confirmationSubscription_request.html.twig", "/Users/lyvangalonde/Desktop/documents OCEADS/projet CRM/briefApi/briefApi/templates/emails/confirmationSubscription_request.html.twig");
    }
}
