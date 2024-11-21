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

/* emails/subscription_request.html.twig */
class __TwigTemplate_e643f1c36ab3efc75f2959da67eb2771 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/subscription_request.html.twig"));

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
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">New subscription Request : ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 13, $this->source); })()), "name", [], "any", false, false, false, 13), "html", null, true);
        echo "</h1>
    <p class=\"mt-4 text-gray-700\">Hello, there's a new request for yout attention.  </p>
    <p class=\"mt-2 text-gray-700\">";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 15, $this->source); })()), "name", [], "any", false, false, false, 15), "html", null, true);
        echo " would like to work with you and use your platform.</p>
    <p class=\"mt-2 text-lg font-semibold text-center text-red-600\">Here is his information:</p>
    <p>
        <span><em>Company Name: </em> ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 18, $this->source); })()), "name", [], "any", false, false, false, 18), "html", null, true);
        echo "</span><br/>
        <span><em>Company Registration Number: </em> ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 19, $this->source); })()), "companyRegistrationNumber", [], "any", false, false, false, 19), "html", null, true);
        echo "</span><br/>
        <span><em>Company VAT Number: </em> ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 20, $this->source); })()), "vatNumber", [], "any", false, false, false, 20), "html", null, true);
        echo "</span><br/>
        <span><em>Company Zip Code: </em> ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 21, $this->source); })()), "zipcode", [], "any", false, false, false, 21), "html", null, true);
        echo "</span><br/>
        <span><em>Company Adress: </em> ";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 22, $this->source); })()), "address", [], "any", false, false, false, 22), "html", null, true);
        echo "</span><br/>
        <span><em>Company City: </em> ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["company"]) || array_key_exists("company", $context) ? $context["company"] : (function () { throw new RuntimeError('Variable "company" does not exist.', 23, $this->source); })()), "city", [], "any", false, false, false, 23), "html", null, true);
        echo "</span><br/>
    </p>
    <p class=\"mt-4 text-gray-700\">If you wish, you can create a new user using the e-mail address provided: golobal email </p>
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
        return "emails/subscription_request.html.twig";
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
        return array (  85 => 23,  81 => 22,  77 => 21,  73 => 20,  69 => 19,  65 => 18,  59 => 15,  54 => 13,  40 => 1,);
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
    <h1 class=\"text-2xl font-bold text-center text-blue-600\">New subscription Request : {{ company.name }}</h1>
    <p class=\"mt-4 text-gray-700\">Hello, there's a new request for yout attention.  </p>
    <p class=\"mt-2 text-gray-700\">{{ company.name }} would like to work with you and use your platform.</p>
    <p class=\"mt-2 text-lg font-semibold text-center text-red-600\">Here is his information:</p>
    <p>
        <span><em>Company Name: </em> {{ company.name }}</span><br/>
        <span><em>Company Registration Number: </em> {{ company.companyRegistrationNumber }}</span><br/>
        <span><em>Company VAT Number: </em> {{ company.vatNumber }}</span><br/>
        <span><em>Company Zip Code: </em> {{ company.zipcode }}</span><br/>
        <span><em>Company Adress: </em> {{ company.address }}</span><br/>
        <span><em>Company City: </em> {{ company.city }}</span><br/>
    </p>
    <p class=\"mt-4 text-gray-700\">If you wish, you can create a new user using the e-mail address provided: golobal email </p>
    <p class=\"mt-4 text-gray-700\">Best regards,</p>
    <p class=\"text-gray-700\">The BriefMaster Team</p>
</div>
</body>
</html>
", "emails/subscription_request.html.twig", "/Users/lyvangalonde/Desktop/documents OCEADS/projet CRM/briefApi/briefApi/templates/emails/subscription_request.html.twig");
    }
}
