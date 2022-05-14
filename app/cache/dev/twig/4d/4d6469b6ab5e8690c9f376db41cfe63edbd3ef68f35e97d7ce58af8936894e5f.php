<?php

/* AppBundle:Backend:confirm_modal.html.twig */
class __TwigTemplate_8f47ed8fb1dc82e1fbb0f81d9747f3206f45a1e6f9a2b022e2b8cc3aa8a7a53e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:confirm_modal.html.twig"));

        // line 1
        echo "<!-- The Modal -->
<div class=\"modal fade\" id=\"confirm-modal\" data-show='false'>
    <div class=\"modal-dialog\">
        <div class=\"modal-content bg-c-yellow\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title text-white\"><i class=\"feather icon-alert-triangle\"></i> Advertencia</h5>
                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
            </div>
            <div class=\"modal-body\">
                <p id=\"question-p\" class=\"text-black-50 font-weight-bold\">
                    ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["confirmQuestion"]) ? $context["confirmQuestion"] : $this->getContext($context, "confirmQuestion")), "html", null, true);
        echo "
                </p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-rounded btn-outline-light\" data-dismiss=\"modal\">Cancelar</button>
                <a class=\"btn btn-rounded btn-outline-light btn-ok\" id=\"btn-ok\">Aceptar</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
\$(document).ready(function() {
    \$('#confirm-modal').modal();

    \$('#confirm-modal').on('show.bs.modal', function(e) {
        \$(this).find('#btn-ok').attr('href', \$(e.relatedTarget).data('href'));

        // Get the question text
        var text = \$(this).find('#question-p').text();

        // Replace [ID] with the data 'id'
        var replaceText = \"<strong><span class='delete-id'>\" + \$(e.relatedTarget).data('id') + \"</span></strong>\";
        text = text.replace('[ID]', replaceText);
        \$(this).find('#question-p').html(text);
    });

    \$('#confirm-modal').on('hidden.bs.modal', function (e) {
        // Switch back to [ID]
        \$(this).find('#question-p').find('span.delete-id').replaceWith('[ID]');
    })
});    
</script>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:confirm_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- The Modal -->
<div class=\"modal fade\" id=\"confirm-modal\" data-show='false'>
    <div class=\"modal-dialog\">
        <div class=\"modal-content bg-c-yellow\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title text-white\"><i class=\"feather icon-alert-triangle\"></i> Advertencia</h5>
                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
            </div>
            <div class=\"modal-body\">
                <p id=\"question-p\" class=\"text-black-50 font-weight-bold\">
                    {{ confirmQuestion }}
                </p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-rounded btn-outline-light\" data-dismiss=\"modal\">Cancelar</button>
                <a class=\"btn btn-rounded btn-outline-light btn-ok\" id=\"btn-ok\">Aceptar</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
\$(document).ready(function() {
    \$('#confirm-modal').modal();

    \$('#confirm-modal').on('show.bs.modal', function(e) {
        \$(this).find('#btn-ok').attr('href', \$(e.relatedTarget).data('href'));

        // Get the question text
        var text = \$(this).find('#question-p').text();

        // Replace [ID] with the data 'id'
        var replaceText = \"<strong><span class='delete-id'>\" + \$(e.relatedTarget).data('id') + \"</span></strong>\";
        text = text.replace('[ID]', replaceText);
        \$(this).find('#question-p').html(text);
    });

    \$('#confirm-modal').on('hidden.bs.modal', function (e) {
        // Switch back to [ID]
        \$(this).find('#question-p').find('span.delete-id').replaceWith('[ID]');
    })
});    
</script>", "AppBundle:Backend:confirm_modal.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/confirm_modal.html.twig");
    }
}
