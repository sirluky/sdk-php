<?php declare(strict_types = 1);

namespace Comgate\SDK\Entity;

class PaymentNotification
{

	/** @var string|null */
	protected $merchant;

	/** @var bool|null */
	protected $test;

	/** @var Money|null */
	protected $price;

	/** @var string|null */
	protected $currency;

	/** @var string|null */
	protected $label;

	/** @var string|null */
	protected $referenceId;

	/** @var string|null */
	protected $email;

	/** @var string|null */
	protected $transactionId;

	/** @var string|null */
	protected $status;

	/** @var string|null */
	protected $fee;

	final private function __construct()
	{
	}

	/**
	 * @return static
	 */
	public static function create(): self
	{
		return new static();
	}

	/**
	 * @return static
	 */
	public static function createFromGlobals(): self
	{
		return self::createFrom($_POST);
	}

	/**
	 * @param mixed[] $data
	 * @return static
	 */
	public static function createFrom(array $data): self
	{
		$self = new static();
		$self->merchant = $data['merchant'] ?? null;
		$self->test = filter_var($data['test'] ?? null, FILTER_VALIDATE_BOOLEAN);
		$self->price = isset($data['price']) ? Money::ofCents((int) $data['price']) : null;
		$self->currency = $data['curr'] ?? null;
		$self->label = $data['label'] ?? null;
		$self->referenceId = $data['refId'] ?? null;
		$self->email = $data['email'] ?? null;
		$self->transactionId = $data['transId'] ?? null;
		$self->status = $data['status'] ?? null;
		$self->fee = $data['fee'] ?? null;

		return $self;
	}

	public function getTransactionId(): ?string
	{
		return $this->transactionId;
	}

	public function getMerchant(): ?string
	{
		return $this->merchant;
	}

	public function isTest(): ?bool
	{
		return $this->test;
	}

	public function getPrice(): ?Money
	{
		return $this->price;
	}

	public function getCurrency(): ?string
	{
		return $this->currency;
	}

	public function getLabel(): ?string
	{
		return $this->label;
	}

	public function getReferenceId(): ?string
	{
		return $this->referenceId;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function getFee(): ?string
	{
		return $this->fee;
	}

}
