<div class="row">
    {!! Form::open(array('url' => '/admin/projects/filter', 'method' => 'POST', 'id' => 'filterProjects', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('query', Translate::recursive('common.query') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('customer_id', Translate::recursive('portfolio::members.customer_id') .': ', array('class' => '')) !!}
            {!! Form::select('customer_id', $customers, $input['customer_id'], array('placeholder' => Translate::recursive('portfolio::members.customer_id'), 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('project_type_id', Translate::recursive('portfolio::members.project_type_id') .': ', array('class' => '')) !!}
            {!! Form::select('project_type_id', $projectTypes, $input['project_type_id'], array('placeholder' => Translate::recursive('portfolio::members.project_type_id'), 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('shown', Translate::recursive('portfolio::form.shown') .': ', array('class' => '')) !!}
            {!! Form::select('shown', $visibilityOptions, $input['shown'], array('placeholder' => Translate::recursive('portfolio::form.shown'), 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.projects.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
