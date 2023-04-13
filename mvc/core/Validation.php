<?php
class Validation {
    private $post;
    private $file;
    private $errors = [];
    // private static $cateFields = ['cateName'];

    public function __construct($post_data, $file_data = null) {
        $this->post = $post_data;
        $this->file = $file_data;
    }

    // ==================================== PUBLIC ==================================== //
    public function cateValidate() {
        // foreach(self::$cateFields as $cateField) {
        //     if(!array_key_exists($cateField, $this->data)) {
        //         trigger_error("{$cateField} is not present in the data");
        //         return;
        //     }
        // }

        $this->cateNameValidate();

        return $this->errors;
    }

    public function newsValidate() {
        $this->newsTitleValidate();
        $this->newsDescValidate();
        $this->newsCateValidate();
        $this->newsContentValidate();
        $this->newsImgValidate();
        return $this->errors;
    }

    public function loginValidate() {
        $this->usernameValidate();
        $this->passwordValidate();
        return $this->errors;
    }

    public function signupValidate() {
        $this->usernameValidate();
        $this->fullnameValidate();
        $this->passwordValidate();
        $this->repasswordValidate();
        $this->pwdAndrePwdCheck();
        return $this->errors;
    }

    // ==================================== PRIVATE ==================================== //

    // ========== AUTH ========== //
    private function usernameValidate() {
        $username = trim($this->post["userName"]);
        if(empty($username)) {
            $this->addError("username", "Bạn chưa nhập tên tài khoản");
        }
    }

    private function passwordValidate() {
        $pwd = trim($this->post["password"]);
        if(empty($pwd)) {
            $this->addError("password", "Bạn chưa nhập mật khẩu");
        }
    }

    private function repasswordValidate() {
        $repwd = trim($this->post["re-password"]);
        if(empty($repwd)) {
            $this->addError("re-password", "Bạn chưa nhập xác nhận mật khẩu");
        }
    }

    private function pwdAndrePwdCheck() {
        $pwd = trim($this->post["password"]);
        $repwd = trim($this->post["re-password"]);

        if($pwd != $repwd) {
            $this->addError("re-password", "Mật khẩu và xác nhận mật khẩu phải khớp nhau");
        }
    }

    private function fullnameValidate() {
        $fname = trim($this->post["fullname"]);
        if(empty($fname)) {
            $this->addError("fullname", "Bạn chưa nhập họ và tên");
        }
    }

    // ========== NEWS ========== //
    private function newsTitleValidate() {
        $title = trim($this->post["title"]);
        $pregMatch = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i';

        if(empty($title)) {
            $this->addError("title", "Phải nhập vào ô tiêu đề để tiếp tục");
        } else {
            if(!preg_match($pregMatch, $title)) {
                $this->addError("title", "Tiêu đề không được chứa các ký tự đặc biệt");
            }
        }
    }

    private function newsDescValidate() {
        $desc = trim($this->post["desc"]);
        $pregMatch = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i';

        if(empty($desc)) {
            $this->addError("desc", "Phải nhập vào ô miêu tả để tiếp tục");
        } else {
            if(!preg_match($pregMatch, $desc)) {
                $this->addError("desc", "Ô miêu tả không được chứa các ký tự đặc biệt");
            }
        }
    }

    private function newsCateValidate() {
        $cate = trim($this->post["desc"]);
        $pregMatch = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i';

        if(empty($cate)) {
            $this->addError("cate", "Bạn phải chọn ít nhất 1 thể loại");
        }
    }

    private function newsContentValidate() {
        $content = trim($this->post["content"]);
        $pregMatch = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i';

        if(empty($content)) {
            $this->addError("content", "Bạn phải nhập vào ô nội dung");
        } else {
            if(!preg_match($pregMatch, $content)) {
                $this->addError("content", "Ô nội dung không được chứa các ký tự đặc biệt");
            }
        }
    }

    private function newsImgValidate() {

            $file = $this->file;

            $fileSize = $file["size"];
            $baseName = $file["name"];

            $ext = strtolower(pathinfo($baseName, PATHINFO_EXTENSION));
            $allowedExt = ["jpg", "jpeg", "png", "jfif", "tiff"];

            if(!empty($baseName)) {
                if(!in_array($ext, $allowedExt)) {
                    $this->addError("img", "Định dạng ảnh của bạn không hợp lệ");
                } 
                if($fileSize > 500000) {
                    $this->addError("img", "Kích thước ảnh của bạn quá lớn");
                } 
            }
    }

    // ========== CATEGORY ========== //

    private function cateNameValidate() {
        $cateName = trim($this->post["cateName"]);
        $pregMatch = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i';

        if(empty($cateName)) {
            $this->addError("cateName", "Người dùng phải nhập vào ô tên thể loại để tiếp tục");
        } else {
            if(!preg_match($pregMatch, $cateName)) {
                $this->addError("cateName", "Tên thể loại không được chứa các ký tự đặc biệt");
            }
        }
    }

    // ========== ADD ERROR FUNCTION ========== //

    private function addError($errorField, $errorContent) {
        $this->errors[$errorField] = $errorContent;
    }

}
?>