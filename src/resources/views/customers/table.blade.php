
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('members.segment') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $customers as $customer )
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{!! HTML::linkRoute('admin.'. $customer->object->getUrlKey() .'.show', $customer->object->present()->fullName, array($customer->object->id)) !!}</td>
                    <td><span class="glyphicon glyphicon-{{ $customer->object->present()->segmentIcon }}" aria-hidden="true"></span></td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::linkRoute('admin.'. $customer->object->getUrlKey() .'.edit', Translate::recursive('common.edit'), array($customer->id), array('class' => 'btn btn-actions')) !!}</li>
                                <li>{!! HTML::linkRoute('admin.'. $customer->object->getUrlKey() .'.show', Translate::recursive('common.delete'), array($customer->id, '_token' => csrf_token()), array('class' => 'btn btn-actions rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $customers->render() !!}
    </div>