<?php

/* AppBundle:Backend:comments_modal.html.twig */
class __TwigTemplate_8589bb33d16f6371457f2277b28f5172832c66ddb71271f3b35379fdcceb3b49 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:comments_modal.html.twig"));

        // line 1
        echo "<!-- The Modal -->
<div class=\"modal modal-danger\" id=\"confirm-modal\" data-show='false'>
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
                <h4 class=\"modal-title\">Comentarios</h4>
            </div>
            <div class=\"modal-body\">
                <p id=\"comment\">
                </p>
            </div>
            <div class=\"modal-footer\">
                <a class=\"btn btn-outline btn-ok\" id=\"btn-ok\" data-dismiss=\"modal\">
                    Aceptar
                </a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    \$('#confirm-modal').modal();

    \$('#confirm-modal').on('show.bs.modal', function(e) {
        \$(this).find('#comment').append(\"<span class='comment'>\" + \$(e.relatedTarget).data('comment') + \"</span>\");
    });

    \$('#confirm-modal').on('hidden.bs.modal', function (e) {
        \$(this).find('#comment').find('span.comment').remove();
    })
</script>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:comments_modal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
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
<div class=\"modal modal-danger\" id=\"confirm-modal\" data-show='false'>
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
                <h4 class=\"modal-title\">Comentarios</h4>
            </div>
            <div class=\"modal-body\">
                <p id=\"comment\">
                </p>
            </div>
            <div class=\"modal-footer\">
                <a class=\"btn btn-outline btn-ok\" id=\"btn-ok\" data-dismiss=\"modal\">
                    Aceptar
                </a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    \$('#confirm-modal').modal();

    \$('#confirm-modal').on('show.bs.modal', function(e) {
        \$(this).find('#comment').append(\"<span class='comment'>\" + \$(e.relatedTarget).data('comment') + \"</span>\");
    });

    \$('#confirm-modal').on('hidden.bs.modal', function (e) {
        \$(this).find('#comment').find('span.comment').remove();
    })
</script>", "AppBundle:Backend:comments_modal.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/comments_modal.html.twig");
    }
}
