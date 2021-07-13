@formField('input', [
    'name' => 'name',
    'label' => twillTrans('twill::lang.user-management.name'),
    'maxlength' => 70
])

@unless($item ?? null)
    @formField('input', [
        'name' => 'email',
        'label' => twillTrans('twill::lang.user-management.email'),
        'type' => 'email'
    ])

    @can('edit-user-role')
        @php $userModel = twillModel('user') @endphp

        @formField('select', [
            'name' => $userModel::getRoleColumnName(),
            'label' => twillTrans('twill::lang.user-management.role'),
            'native' => true,
            'options' => $roleList ?? [],
            'default' => $roleList[0]['value'] ?? '',
            'placeholder' => 'Select a role'
        ])
    @endcan
@endunless
