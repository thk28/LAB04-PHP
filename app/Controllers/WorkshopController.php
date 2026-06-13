<?php
namespace App\Controllers;

class WorkshopController {
    private array $allowedWorkshops = ['ai-trends', 'secure-php', 'uiux-design'];

    public function index(): void {
        view('workshop/index', [
            'view' => 'workshop/index',
            'registrations' => $this->loadData(),
        ]);
    }

    public function create(): void {
        view('workshop/create', [
            'view' => 'workshop/create',
            'old' => flash_get('old', []),
            'errors' => flash_get('errors', []),
            'allowedWorkshops' => $this->allowedWorkshops,
        ]);
    }

    public function store(): void {
        $data = [
            'fullname' => trim($_POST['fullname'] ?? ''),
            'email'    => trim($_POST['email'] ?? ''),
            'phone'    => trim($_POST['phone'] ?? ''),
            'topic'    => trim($_POST['topic'] ?? ''),
            'note'     => trim($_POST['note'] ?? ''),
            'nickname' => trim($_POST['nickname'] ?? ''),
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            flash_set('errors', $errors);
            flash_set('old', $data);
            redirect('/workshop/register');
        }

        $this->saveData($data);
        $_SESSION['last_workshop_submit_at'] = time(); 

        flash_set('success', 'Đăng ký tham gia Workshop thành công!');
        redirect('/workshop');
    }

    private function validate(array $data): array {
        $errors = [];

        if ($data['nickname'] !== '') {
            $errors['_global'] = 'Hệ thống phát hiện hành vi spam tự động từ Bot!';
        }

        $lastSubmit = $_SESSION['last_workshop_submit_at'] ?? 0;
        if ($lastSubmit && (time() - $lastSubmit < 5)) {
            $errors['_global'] = 'Bạn đang thao tác quá nhanh, vui lòng chờ 5 giây trước khi gửi lại.';
        }

        if ($data['fullname'] === '') {
            $errors['fullname'] = 'Họ tên không được để trống.';
        } elseif (mb_strlen($data['fullname']) < 3) {
            $errors['fullname'] = 'Họ tên phải chứa ít nhất 3 ký tự.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Email không được để trống.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Định dạng Email không hợp lệ.';
        }

        if ($data['phone'] === '') {
            $errors['phone'] = 'Số điện thoại không được để trống.';
        } elseif (!preg_match('/^[0-9]{9,11}$/', $data['phone'])) {
            $errors['phone'] = 'Số điện thoại phải từ 9 đến 11 chữ số.';
        }

        if ($data['topic'] === '' || !in_array($data['topic'], $this->allowedWorkshops, true)) {
            $errors['topic'] = 'Vui lòng lựa chọn chủ đề Workshop hợp lệ.';
        }

        return $errors;
    }

    private function loadData(): array {
        $file = __DIR__ . '/../../storage/registrations.json';
        if (!file_exists($file)) return [];
        return json_decode(file_get_contents($file), true) ?: [];
    }

    private function saveData(array $data): void {
        $file = __DIR__ . '/../../storage/registrations.json';
        $items = $this->loadData();
        
        $items[] = [
            'id' => 'W' . str_pad((string)(count($items) + 1), 3, '0', STR_PAD_LEFT),
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'topic' => $data['topic'],
            'note' => $data['note'],
            'registered_at' => date('Y-m-d H:i:s')
        ];
        file_put_contents($file, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}