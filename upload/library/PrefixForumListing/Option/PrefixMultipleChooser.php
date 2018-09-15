<?php
class PrefixForumListing_Option_PrefixMultipleChooser {
    public static function renderSelectM(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit) {
        $preparedOption['formatParams'] = array();
        $model = XenForo_Model::create('XenForo_Model_ThreadPrefix');
        foreach ($model->getAllPrefixes() as $prefix) {
            $prefixId = $prefix['prefix_id'];
            $preparedOption['formatParams'][] = array(
                'name' => "{$fieldPrefix}[{$preparedOption['option_id']}][$prefixId]",
                'label' => new XenForo_Phrase($model->getPrefixTitlePhraseName($prefixId)) . ' (ID: ' . $prefixId . ')',
                'selected' => !empty($preparedOption['option_value'][$prefixId]),
            );
        }
        return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal('option_list_option_checkbox', $view,
            $fieldPrefix, $preparedOption, $canEdit, array(
                'class' => 'checkboxColumns',
            ));
    }
}
