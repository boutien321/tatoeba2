<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2010 HO Ngoc Phuong Trang
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

class SentencesList extends Entity
{
    protected function _getOldFormat() 
    {
        return [
            'SentencesList' => [
                'id' => $this->id,
                'name' => $this->name,
                'user_id' => $this->user_id,
                'editable_by' => $this->editable_by
            ]
        ];
    }

    protected function _getSavedOldFormat()
    {
        $joinData = $this->sentences[0]->_joinData;
        
        if ($joinData) {
            $result = [
                'SentencesSentencesLists' => [
                    'sentence_id' => $joinData->sentence_id,
                    'sentences_list_id' => $joinData->sentences_list_id
                ]
            ];
        } else {
            $result = [];
        }
        
        return $result;
    }

    public function isEditableBy($userId)
    {
        return $this->user_id == $userId || $this->editably_by == 'anyone';
    }
}