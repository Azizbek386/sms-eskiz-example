<?php

namespace App\DTO\Auth;

class UserDTO
{
    public string $name;
    public string $last_name;
    public string $phone;
    public ?string $avatar;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->last_name = $data['last_name'];
        $this->phone = $data['phone'];
        $this->avatar = $data['avatar'] ?? null;
    }
    private function storeAvatarIfExists($avatar): ?string
{
    if ($avatar) {
        $path = $avatar->store('avatars', 'public');
        return '/storage/' . $path;
    }

    return null;
}

}
