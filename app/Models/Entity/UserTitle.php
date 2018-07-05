<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;

/**
 * 用户标签连接表

 * @Entity()
 * @Table(name="user_title")
 * @uses      UserTitle
 */
class UserTitle extends Model
{
    /**
     * @var int $id
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int $uid
     * @Column(name="uid", type="integer")
     * @Required()
     */
    private $uid;

    /**
     * @var int $titleId
     * @Column(name="title_id", type="integer")
     * @Required()
     */
    private $titleId;

    /**
     * @var string $createdAt
     * @Column(name="created_at", type="datetime", default="CURRENT_TIMESTAMP")
     */
    private $createdAt;

    /**
     * @var string $updatedAt
     * @Column(name="updated_at", type="datetime", default="CURRENT_TIMESTAMP")
     */
    private $updatedAt;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setUid(int $value): self
    {
        $this->uid = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setTitleId(int $value): self
    {
        $this->titleId = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCreatedAt(string $value): self
    {
        $this->createdAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUpdatedAt(string $value): self
    {
        $this->updatedAt = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return int
     */
    public function getTitleId()
    {
        return $this->titleId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
