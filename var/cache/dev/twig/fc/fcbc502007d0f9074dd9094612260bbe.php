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

/* emails/password_changed.html.twig */
class __TwigTemplate_c797f262816983d4be361eb269369309 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/password_changed.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Password Changed</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css');
    </style>
</head>
<body class=\"bg-gray-100\">
<div class=\"max-w-lg mx-auto p-6 bg-white shadow-md rounded-md\">
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">Password Changed</h1>
    <p class=\"mt-4 text-gray-700\">Hello ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 14, $this->source); })()), "firstname", [], "any", false, false, false, 14), "html", null, true);
        echo ",</p>
    <p class=\"mt-2 text-gray-700\">Your password has been successfully changed. Here is your new password:</p>
    <p class=\"mt-2 text-lg font-semibold text-center text-red-600\">";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["generatedPassword"]) || array_key_exists("generatedPassword", $context) ? $context["generatedPassword"] : (function () { throw new RuntimeError('Variable "generatedPassword" does not exist.', 16, $this->source); })()), "html", null, true);
        echo "</p>
    <p class=\"mt-4 text-gray-700\">For your security, please change this password after logging in.</p>
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
        return "emails/password_changed.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  60 => 16,  55 => 14,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Password Changed</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css');
    </style>
</head>
<body class=\"bg-gray-100\">
<div class=\"max-w-lg mx-auto p-6 bg-white shadow-md rounded-md\">
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">Password Changed</h1>
    <p class=\"mt-4 text-gray-700\">Hello {{ user.firstname }},</p>
    <p class=\"mt-2 text-gray-700\">Your password has been successfully changed. Here is your new password:</p>
    <p class=\"mt-2 text-lg font-semibold text-center text-red-600\">{{ generatedPassword }}</p>
    <p class=\"mt-4 text-gray-700\">For your security, please change this password after logging in.</p>
    <p class=\"mt-4 text-gray-700\">Best regards,</p>
    <p class=\"text-gray-700\">The BriefMaster Team</p>
</div>
</body>
</html>
", "emails/password_changed.html.twig", "/Users/lyvangalonde/Desktop/documents OCEADS/projet CRM/briefApi/briefApi/templates/emails/password_changed.html.twig");
    }
}
